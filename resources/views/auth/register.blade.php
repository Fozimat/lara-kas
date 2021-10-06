@extends('layouts.auth')
@section('title', 'Register')
@section('content')

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Pengelolaan-<b>KAS</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="signin" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="name" type="text" class="form-control @error('name') focused error @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Name Surname">
                        </div>
                        @error('name')
                        <span class="font-bold text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" placeholder="Email Address"
                                class="form-control @error('email') focused error @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
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
                                placeholder="Password" autocomplete="new-password">
                        </div>
                        @error('password')
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
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm Password">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN
                        UP</button>
                </form>
                <div class="row m-t-20 m-b--5 align-center">
                    <a href="{{ route('login') }}">Sign In!</a>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection