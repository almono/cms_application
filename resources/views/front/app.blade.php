<!doctype html>
<html lang="en">
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}"/>
    <script type="text/javascript" src="{{URL::asset('js/app.js') }}"></script>

    @if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130574294-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-130574294-1');
    </script>
    @endif
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
        <div class="container" style="position: fixed; left: 0; right: 0; bottom: 20%; z-index: 10;">
            @if (session()->has("flash_notification"))
                @include('flash::message')
            @endif
        </div>
    </div>
</body>
</html>

@yield('scripts')


