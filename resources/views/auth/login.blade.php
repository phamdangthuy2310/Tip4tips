@extends('layouts.app')
@section('bodyclass','login-page')
@section('javascript')
    <script>
      $(function () {
        var body = $('body');
        var backgrounds = [
          'url({{asset('images/bg-home-1.jpg')}})',
          'url({{asset('images/bg-home-2.jpg')}})',
          'url({{asset('images/bg-home-3.jpg')}})',
          'url({{asset('images/bg-home-4.jpg')}})'
        ];
        var current = 0;

        function nextBackground() {
          body.css(
            'background-image',
            backgrounds[current = ++current % backgrounds.length]);

          setTimeout(nextBackground, 20000);
        }
        setTimeout(nextBackground, 20000);
        body.css('background-image', backgrounds[0]);
      });
    </script>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default login__wrapper">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="login__form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <p class="text-right"><a class="btn btn-link btn-forget" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
