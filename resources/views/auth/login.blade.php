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

    <title>CMS Login</title>
</head>
<body class="login_body" style="background-image: url({{ asset('img/admin_bg.jpg') }})">
@include('admin.cms_admin_content_top')

<div class="card login_box">
    <div class="card-header text-center login_header">{{ __('Login') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row" style="height: 30px;">
                <label for="email" class="col-xs-12 col-sm-12 col-md-5 col-form-label text-md-right label_login flex_display" style="height: 100%;">{{ __('E-Mail Address') }}</label>

                <div class="col-xs-12 col-sm-12 col-md-7">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} flex_display" name="email" value="{{ old('email') }}" placeholder="Email..." required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert" style="color: #879042;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row" style="height: 30px;">
                <label for="password" class="col-xs-12 col-sm-12 col-md-5 col-form-label text-md-right label_login flex_display" style="height: 100%;">{{ __('Password') }}</label>

                <div class="col-xs-12 col-sm-12 col-md-7">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} flex_display" name="password"  placeholder="Password..." required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert" style="color: #879042;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <?php /*
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember" style="color: white; font-weight: 400;">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
 */ ?>
            <div class="form-group row mb-0 text-center">
                <div class="col-md-12">
                    <a class="btn btn-link link-new" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-new">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>