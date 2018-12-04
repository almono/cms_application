<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Page;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','aboutMe','downloadFile']] );
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

    public function aboutMe()
    {
        return view('front.about_me');
    }

    public function downloadFile($filename)
    {
        $filepath = public_path('projects/' . $filename . '.rar');

        if(File::exists($filepath))
        {
            return \Response::download( $filepath, $filename );
        }
        else
        {
            flash()->error('This file was not found on the server!');
            return redirect('/');
        }
    }
}
