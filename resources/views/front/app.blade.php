<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(isset($seo_title) && !is_null($seo_title))
    <title>{{ $seo_title }}</title>
    @else
    <title>almono's CMS application Front</title>
    @endif
    <meta name="description" content="Display of Laravel CMS Application made by Paweł Walczykiewicz">
    <meta name="keywords" content="laravel,php,cms,web,application">
    <meta name="robots" content="index, follow">

    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/pretty-checkbox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.min.css') }}">

    <script type="text/javascript" src="{{URL::asset('js/jquery-3.2.1.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery.sticky.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/owl.carousel.min.js')}}"></script>
</head>

<body style="background: #464646;">
    <div id="front_wrapper">
        <div class="container-fluid padding_fix">
            @include('front.navbar')
        </div>
        <div class="container" style="padding-bottom: 60px;">
            @yield('front-content')
        </div>
        <div class="container-fluid footer-container" style="background-color: #222;">
            <div class="footer">
                @include('front.footer')
            </div>
        </div>
        <div class="container" style="position: fixed; left: 0; right: 0; bottom: 20%;">
            @if (session()->has("flash_notification"))
                @include('flash::message')
            @endif
        </div>
    </div>
</body>
</html>

@yield('scripts')


