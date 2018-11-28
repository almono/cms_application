@extends('front.app')
@section('front-content')
    <h1>Welcome to my application!</h1>
    <div class="col-xs-12 padding_fix">
        <p>
            Hello! This is an application I made completely from scratch to practice and improve my front-end and back-end skills with the help of Laravel 5.7 Framework.
        Here you will be able to find some projects I have made while studying at the University ( all of them being IT related ) and also projects I have made completely for myself mainly as
        a hobby or just something I tried out during my free time.
        </p>
        <p>
            This page is mainly used as a landing page but be sure to check out other pages on this website.
        </p>
        <p>Pages:</p>
        <div class="col-xs-12 padding_fix">
            <ul class="home_list">
                <li class="home_list_item"><a href="{{ route('show_page',['page_slug' => 'asd']) }}">Programming projects</a></li>
                <li class="home_list_item"><a href="">University projects</a></li>
            </ul>
        </div>
    </div>
    <div class="col-xs-12 padding_fix">
        <h2>Recently updated</h2>
    </div>
@stop