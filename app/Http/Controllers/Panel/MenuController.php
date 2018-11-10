<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Menu;
use Bouncer;
use Auth;
use Mockery\Exception;

class MenuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Bouncer::can('view-menu') || Auth::user()->super_admin == '1') {
            $menu = Menu::paginate(20);
            $menu_main = Menu::where('parent_id','0')->get();
            return view('admin.cms_menu_items', compact(['menu','menu_main']));
        }
        else {
            flash()->error("You don't have permission to view menu!");
            return redirect()->route('admin');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Bouncer::can('create-menu') || Auth::user()->super_admin == '1') {
            try {
                if(isset($request['menu_name']) && $request['menu_name'] != '')
                {
                    $menu = new Menu();
                    $menu->menu_name = $request['menu_name'];
                    $menu->menu_slug = str_slug($request['menu_name']);
                }
                if(isset($request['menu_url']) && $request['menu_url'] != '')
                {
                    $menu->menu_url = $request['menu_url'];
                }
                if(isset($request['menu_parent']) && $request['menu_parent'] != '')
                {
                    $menu->parent_id = $request['menu_parent'];
                }
                else {
                    $menu->parent_id = '0';
                }

                $menu->order = $request['menu_order'];
                $menu->save();
            }
            catch (Exception $e) {
                flash()->error("There has been a problem while creating new menu");
                return back();
            }
        }
        else {
            flash()->error("You don't have permission to create new menu item!");
            return redirect()->route('admin');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $menu->delete();
            flash()->success('Menu has been removed');
        }
        catch (Exception $e) {
            flash()->error("Menu couldn't be removed");
        }

        return back();
    }
    
    public function changeActive(Request $request)
    {
        if (Bouncer::can('manage-menu') || Auth::user()->super_admin == '1') {
            $id = $request->get('id');
            $menu = Menu::findOrFail($id);

            if ($menu->active == '1')
            {
                $menu->active = '0';
            }
            else {
                $menu->active = '1';
            }

            try {
                $menu->save();
            }
            catch(Exception $e) {
                return 'Error while updating';
            }

            return "State has been changed";
        }
        else {
            return "You don't have permission to do that!";
        }

    }
}
