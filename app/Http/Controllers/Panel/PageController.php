<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

use App\Page;
use Illuminate\Http\Request;
use Bouncer;
use Auth;
use Mockery\Exception;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Bouncer::can('view-pages') || Auth::user()->super_admin == '1') {
            $pages = Page::paginate(20);

            if ($request->ajax()) {
                return view('admin.partials.cms_page_listing', ['pages' => $pages])->render();
            }

            return view('admin.cms_pages', compact(['pages']));
        }
        else {
            flash()->error("You don't have permission to view pages!");
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
        if (Bouncer::can('create-pages') || Auth::user()->super_admin == '1') {
            try {
                if(isset($request['menu_name']) && $request['menu_name'] != '')
                {
                    $menu = new Menu();
                    $menu->menu_name = $request['menu_name'];
                    $menu->menu_slug = str_slug($request['menu_name']);

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
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->delete();
            flash()->success('Page has been removed');
        }
        catch (Exception $e) {
            flash()->error("Page couldn't be removed");
        }

        return back();
    }

    public function changeActive(Request $request)
    {
        if (Bouncer::can('manage-pages') || Auth::user()->super_admin == '1') {
            $id = $request->get('id');
            $page = Page::findOrFail($id);

            if ($page->active == '1')
            {
                $page->active = '0';
            }
            else {
                $page->active = '1';
            }

            try {
                $page->save();
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

    public function newPage() {
        return view('admin.cms_new_page');
    }
}
