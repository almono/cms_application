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

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Bouncer::can('view-menu') || Auth::user()->super_admin == '1') {
            $menu = Menu::paginate(20);
            $menu_main = Menu::where('parent_id','0')->get();

            if ($request->ajax()) {
                return view('admin.partials.cms_menu_listing', ['menu' => $menu,'menu_main' => $menu_main])->render();
            }

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
            return back();
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
        if (Bouncer::can('edit-menu') || Auth::user()->super_admin == '1') {
            $menu = Menu::findOrFail($id);
            $menu_main = Menu::whereNotIn('parent_id', ['0', $id])->get();
            return view('admin.cms_edit_menu', compact('menu', 'menu_main'));
        }
        else {
            flash()->error("You don't have permission to edit menu items!");
            return back();
        }
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
    public function update(Request $request, Menu $menu)
    {
        $inputs = $request->all();

        try {

            if(isset($inputs['new_name']) && !is_null($inputs['new_name']))
            {
                $menu->menu_name = $inputs['new_name'];
                $menu->menu_slug = str_slug($inputs['new_name']);
            }
            if(isset($inputs['new_url']) && !is_null($inputs['new_url']))
            {
                $menu->menu_url = $inputs['new_url'];
            }
            if(isset($inputs['new_order']) && !is_null($inputs['new_order']))
            {
                $menu->order = $inputs['new_order'];
            }
            if(isset($inputs['new_parent']) && !is_null($inputs['new_parent']))
            {
                $menu->parent_id = $inputs['new_parent'];
            }

            $menu->save();

            flash()->success("Menu has been updated");
        }
        catch(Exception $e) {
            flash()->error("Menu couldn't be updated");
        }

        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Bouncer::can('delete-menu') || Auth::user()->super_admin == '1') {
            try {
                $menu = Menu::findOrFail($id);
                $menu->delete();
                flash()->success('Menu has been removed');
            }
            catch (Exception $e) {
                flash()->error("Menu couldn't be removed");
            }
        }
        else {
            flash()->error("You don't have permission to delete menu items!");
            return back();
        }
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
