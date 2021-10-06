@extends('layouts.auth')
@section('title', 'Login')
@section('content')

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Pengelolaan-<b>KAS</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" class="form-control @error('email') focused error @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                        <span class="font-bold text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password" type="password"
                                class="form-control @error('password') focused error @enderror" name="password" required
                                autocomplete="current-password">
                        </div>
                        @error('password')
                        <span class="font-bold text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input class="filled-in chk-col-pink" type="checkbox" name="rememberme" id="rememberme"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        @if (Route::has('register'))
                        <div class="col-xs-6">
                            <a href="{{ route('register') }}">Register Now!</a>
                        </div>
                        @endif
                        @if (Route::has('password.request'))
                        <div class="col-xs-6">
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection