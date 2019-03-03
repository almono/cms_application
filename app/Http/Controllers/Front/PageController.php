<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vinkla\Instagram\Instagram;

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

        if($page_slug == 'api')
        {
            try {
                $instagram = new Instagram(env('INSTAGRAM_TOKEN',NULL));
                $instagram_media = $instagram->get();
            } catch (\Exception $e) {
                $instagram_media = NULL;
                Log::info("Instagram connection error! " . $e->getMessage());
            }

            return view('front.apis', compact('page','instagram_media'));
        }
        if (isset($page) && !is_null($page))
        {
            return view('front.page',compact('page'));
        }

        flash()->error("That page could not be displayed");
        return redirect('/');
    }

}
