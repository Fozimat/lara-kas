@extends('layouts.auth')
@section('title', 'Register')
@section('content')

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Pengelolaan-<b>KAS</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username
                        and a
                        link to reset your password.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" placeholder="Email"
                                class="form-control @error('email') focused error @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                        <span class="font-bold text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RESET MY PASSWORD</button>
                </form>
                <div class="row m-t-20 m-b--5 align-center">
                    <a href="{{ route('login') }}">Sign In!</a>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection