<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="siteurl" content="{{URL::to('/')}}">

        <link rel="icon" href="{{asset('favicon.ico')}}">

        <title>Backend</title>
        <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('/js/colorbox/colorbox.css')}}">
        <link rel="stylesheet" href="{{asset('/css/backend/backend.css')}}">
        @yield('css')
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Sign in to GooGoo Radio Dashboard</h1>
                    <div class="account-wall">
                        {{ Form::open(array('url' => 'login', 'class' => 'form-signin')) }}
                        {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com', 'class' => 'form-control')) }}
                        {{ Form::password('password', array('placeholder' => 'password', 'class' => 'form-control')) }}
                        {{ Form::submit('Sign In', array('class' => 'btn btn-lg btn-primary btn-block')) }}
                        <p>
                            {{ $errors->first('email') }}
                            {{ $errors->first('password') }}
                            @if(Session::has('message'))
                                {{ Session::get('message') }}
                            @endif
                        </p>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
