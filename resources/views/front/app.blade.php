<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/pretty-checkbox.min.css') }}">


    <script type="text/javascript" src="{{URL::asset('js/jquery-3.2.1.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery.sticky.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/select2.min.js')}}"></script>

    <title>almono's CMS application Front</title>
</head>

<body style="background: #464646;">
    <div class="container-fluid padding_fix">
        @include('front.navbar')
    </div>
    <div class="container">
        @yield('front-content')
    </div>
    <div class="container-fluid" style="background-color: #222;">
        <div class="footer">
            @include('front.footer')
        </div>
    </div>
</body>
</html>

@yield('scripts')


