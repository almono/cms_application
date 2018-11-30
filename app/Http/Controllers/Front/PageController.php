<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Page;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPage($page_slug)
    {
        $page = Page::where('page_slug',$page_slug)->first();

        if (isset($page) && !is_null($page))
        {
            return view('front.page',compact('page'));
        }

        flash()->error("That page could not be displayed");
        return redirect('/');
    }

}
