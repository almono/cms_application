@extends('front.app', ['seo_title' => 'APIs page - almono CMS application'])
@section('front-content')
    <h1>API Showcase</h1>
    <div class="col-xs-12 padding_fix">
        <h2>
            1. Instagram
        </h2>
        <div class="col-xs-12 padding_fix text-center instagram-container owl-instagram owl-carousel owl-theme owl-home">
            @if(isset($instagram_media) && !is_null($instagram_media))
                @foreach($instagram_media as $ins)
                    <div class="item instagram-div">
                        <a class="insta-popup" href="{{ $ins->images->standard_resolution->url }}" title="{{ $ins->caption->text }}">
                            <img class="img-responsive" src="{{ $ins->images->low_resolution->url }}">
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.owl-instagram').owlCarousel({
                margin: 10,
                loop: true,
                dots: false,
                navText: ["<i class='fa fa-arrow-left'>","<i class='fa fa-arrow-right'>"],
                autoplay: true,
                autoplayTimeout: 3000,
                lazyload: true,
                animateOut: 'fadeOut',
                responsiveClass:true,
                responsive:{
                    0:{
                        items: 1,
                        nav: true,
                        loop: true
                    },
                    600:{
                        items:3,
                        nav: true,
                        loop: true
                    },
                    1000:{
                        items: 4,
                        nav: true,
                        loop: true
                    }
                }
            });

            $('.instagram-div').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        return item.el.attr('title') + '<small>by Paweł Walczykiewicz</small>';
                    }
                }
            });
        });
    </script>
@stop