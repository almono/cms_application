<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Mockery\Exception;
use App\Page;
use Image;
use Bouncer;
use Auth;
use File;
use Carbon\Carbon;


class PageController extends Controller
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
                if(isset($request['page_title']) && $request['page_title'] != '')
                {
                    $page = new Page();
                    $page->page_title = $request['page_title'];
                    $page->page_slug = str_slug($request['page_title']);
                }

                $now = Carbon::now()->timestamp;
                $page->page_image = str_slug($request['page_title']) . "-" . $now;

                if ($request->hasFile('page_image')) {

                    $img = Image::make($request
                        ->file('page_image'))
                        ->resize(600, 600, function ($c) {
                            $c->aspectRatio();
                        })
                        ->resizeCanvas(600, 600)
                        ->save('page_images/' . str_slug($request['page_title']) . "-" . $now . '.jpg', 75);

                }

                $page->description_1 = $request['page_desc1'];
                $page->description_2 = $request['page_desc2'];
                $page->seo_title = $request['seo'];
                $page->seo_description = $request['seo_desc'];
                $page->save();
            }
            catch (Exception $e) {
                flash()->error("There has been a problem while creating a new page");
                return back();
            }
        }
        else {
            flash()->error("You don't have permission to create new page!");
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
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.cms_edit_page',compact('page'));
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
        $inputs = $request->all();

        try {

            $page->page_title = $inputs['page_title'];
            $page->page_slug = str_slug($inputs['page_title']);
            $page->description_1 = $inputs['page_desc1'];
            $page->description_2 = $inputs['page_desc2'];
            $page->seo_title = $request['seo'];
            $page->seo_description = $request['seo_desc'];

            $now = Carbon::now()->timestamp;

            if ($request->hasFile('page_image')) {

                File::delete('page_images/' . $page->page_image . '.jpg' );
                $page->page_image = str_slug($request['page_title']) . "-" . $now;

                $img = Image::make($request
                    ->file('page_image'))
                    ->resize(600, 600, function ($c) {
                        $c->aspectRatio();
                    })
                    ->resizeCanvas(600, 600)
                    ->save('page_images/' . str_slug($request['page_title']) . "-" . $now .  '.jpg', 75);

            }

            $page->save();
            flash()->success("Page has been updated");
        }
        catch(Exception $e) {
            flash()->error("Page couldn't be updated");
        }

        return redirect()->route('pages.index');

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
