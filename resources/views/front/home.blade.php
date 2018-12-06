@extends('front.app', ['seo_title' => 'Homepage - almono CMS application'])
@section('front-content')
    <h1>almono's CMS Application Homepage</h1>
    <div class="col-xs-12 padding_fix">
        <p>
            Hello! This is an application I made completely from scratch to practice and improve my front-end and back-end skills with the help of Laravel 5.7 Framework.
        Here you will be able to find some projects I have made while studying at the University ( all of them being IT related ) and also projects I have made completely for myself mainly as
        a hobby or just something I tried out during my free time.
        </p>
        <p>
            This page is mainly used as a landing page but be sure to check out other pages on this website.
        </p>
        <p>Be sure to visit these places:</p>
        <div class="col-xs-12 padding_fix">
            <ul class="home_list">
                <li class="home_list_item"><a href="{{ route('show_page',['page_slug' => 'programming-projects']) }}">Programming projects</a></li>
                <li class="home_list_item"><a href="{{ route('show_page',['page_slug' => 'university-projects']) }}">University projects</a></li>
            </ul>
        </div>
    </div>
    @if(isset($slider) && !is_null($slider))
        <div class="col-xs-12 padding_fix">
            <h2>Recently updated</h2>
            <div class="owl-carousel owl-theme owl-home" style="min-height: 200px;">
                @foreach($slider as $item)
                    <div class="item">
                        <div class="col-xs-12 slide-title">
                            <a href="{{ url('/page/' . $item->page_slug) }}">
                                <h4>{{ $item->page_title }}</h4>
                            </a>
                        </div>
                        <div class="col-xs-12 padding_fix slide-content">
                            <div class="col-xs-12 col-sm-4 col-md-3 padding_fix slide-image">
                                <a href="{{ url('/page/' . $item->page_slug) }}">
                                    @if(File::exists('page_images/' . $item->page_image . '.jpg'))
                                        <img src="{{ asset('page_images/' . $item->page_image . '.jpg') }}" class="img-responsive" style="padding: 15px;" />
                                    @else
                                        <img src="{{ asset('img/pic_no_found.png') }}" class="img-responsive" style="padding: 15px;" />
                                    @endif
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-9 slide-text">
                                {!! $item->description_2 !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                items: 1,
                margin: 10,
                loop: true,
                dots: true,
                nav: false,
                autoplay: true,
                autoplayTimeout: 3000,
                lazyload: true,
                animateOut: 'fadeOut'
            });
        });
    </script>
@stop