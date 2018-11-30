@extends('front.app', ['seo_title' => "About me - Paweł Walczykiewicz"])
@section('front-content')
    <h1>About me</h1>
    <div class="col-xs-12 padding_fix">
        <div class="col-xs-12">
            <p>Hello there! Here you can find my resume with all the information about my previous experiences, learned skills, education and hobbies.</p>
        </div>
    </div>
    <hr class="col-xs-12" style="width: 100%; border-color: #222;">
    <div class="col-xs-12 padding_fix resume_container">
        <div class="col-xs-12 col-sm-4 col-md-3 padding_fix resume_profile text-center">
            <img src="{{ asset('img/profile_picture.jpg') }}" class="img-responsive">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9 resume_profile_info padding_fix">
            <h2>Paweł Walczykiewicz</h2>
            <div class="col-xs-12">
                <i class="fa fa-home"></i>Address
            </div>
            <div class="col-xs-12">
                <i class="fa fa-phone"></i>602-680-510
            </div>
            <div class="col-xs-12">
                <i class="fa fa-envelope"></i><a href="mailto:pwalczykiewicz93@gmail.com?Subject=Message%20from%20resume%20page" class="resume_link">pwalczykiewicz93@gmail.com</a>
            </div>
            <div class="col-xs-12">
                <i class="fa fa-linkedin"></i><a href="https://www.linkedin.com/in/pwalczykiewicz/" class="resume_link">My Linkedin Profile</a>
            </div>
            <div class="col-xs-12">
                <i class="fa fa-search"></i><a href="{{ route('home') }}" class="resume_link">{{ route('home') }}</a>
            </div>
        </div>
        <hr class="col-xs-12" style="width: 100%; border-color: #222;">
        <div class="col-xs-12 padding_fix resume_info">
            <div class="row col-xs-12 col-sm-6 col-md-3 margin_fix text-center resume_type">
                <span style="font-size: 24px;">EDUCATION</span>
            </div>
            <div class="col-xs-12 padding_fix">
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <p>2013 - 2018</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <p class="m-0-bottom">
                        University of Łódź, Faculty of Mathematics and Computer Science
                    </p>
                    <p style="font-size: 14px; font-style: italic;">Master's Degree in Computer Science</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <p>2009 - 2012</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <p>
                        IX High School in Łódź
                    </p>
                </div>
            </div>
            <hr class="col-xs-12" style="width: 100%; border-color: #222;">
            <div class="row col-xs-12 col-sm-6 col-md-3 margin_fix text-center resume_type">
                <span style="font-size: 24px;">EXPERIENCE</span>
            </div>
            <div class="col-xs-12 padding_fix">
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <p>
                        01.02.2018 – today
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <p class="m-0-bottom">
                        PHP Developer with Laravel framework at Dotandspot
                    </p>
                    <p style="font-size: 14px; font-style: italic;">( Front-end and Back-end )</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <p>
                        16.10.2017 – 30.01.2018
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <p>
                        Internship at Dotandspot as PHP Developer with Laravel Framework
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <p>
                        10.07.2017 – 07.09.2017
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <p>
                        Internship at Polcode as PHP Developer with Laravel Framework
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <p>
                        01.08.2015 – 30.06.2016
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <p class="m-0-bottom">
                        Technical Support Specialist in Aptvision
                    </p>
                    <p style="font-size: 14px; font-style: italic;">( work with PostgreSQL and conversations with clients in english focused on database related problems )</p>
                </div>
            </div>
            <hr class="col-xs-12" style="width: 100%; border-color: #222;">
            <div class="row col-xs-12 col-sm-6 col-md-3 margin_fix text-center resume_type">
                <span style="font-size: 24px;">SKILLS</span>
            </div>
            <div class="col-xs-12 padding_fix">
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>English C1 Level</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>SQL</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>Basic C++</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>PHP ( Laravel 5.7 )</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>JavaScript</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>Jquery</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>AJAX</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>HTML</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>CSS ( Bootstrap )</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>Basic C#, PL/SQL, T-SQL</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>Basic GIT</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>Redmine </p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>Basic GIMP and Photoshop</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>MSoffice</p>
                </div>
            </div>
            <hr class="col-xs-12" style="width: 100%; border-color: #222;">
            <div class="row col-xs-12 col-sm-6 col-md-3 margin_fix text-center resume_type">
                <span style="font-size: 24px;">INTERESTS</span>
            </div>
            <div class="col-xs-12 padding_fix">
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>New Technologies</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>Foreign languages</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>English fantasy books</p>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <p>Music</p>
                </div>
            </div>
        </div>
    </div>
@stop