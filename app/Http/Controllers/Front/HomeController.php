<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','AboutMe']] );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Page::where('active','1')->orderBy('updated_at','DESC')->take(3)->get();
        return view('front.home',compact('slider'));
    }

    public function AboutMe()
    {
        return view('front.about_me');
    }

}
