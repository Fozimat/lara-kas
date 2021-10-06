@extends('layouts.admin')
@section('title', 'Profile')
@section('content')
@if(session('status'))
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">×</span></button>
    {{ session('status') }}
</div>
@endif
<div class="row clearfix">

    <div class="col-xs-12 col-sm-3">
        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                    <img src="{{ asset('assets/images/user-lg.jpg') }}" alt="AdminBSB - Profile Image" />
                </div>
                <div class="content-area">
                    <h3>{{ auth()->user()->name }}</h3>
                    <p>Web Developer</p>
                    <p>Administrator</p>
                </div>
            </div>

        </div>

        <div class="card card-about-me">
            <div class="header">
                <h2>ABOUT ME</h2>
            </div>
            <div class="body">
                <ul>
                    <li>
                        <div class="title">
                            <i class="material-icons">library_books</i>
                            Education
                        </div>
                        <div class="content">
                            Informatics Engineering, STTI Tanjungpinang
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <i class="material-icons">location_on</i>
                            Location
                        </div>
                        <div class="content">
                            Tanjungpinang, Kepulauan Riau
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <i class="material-icons">edit</i>
                            Skills
                        </div>
                        <div class="content">
                            <span class="label bg-blue">PHP</span>
                            <span class="label bg-teal">JavaScript</span>
                            <span class="label bg-amber">Kotlin</span>
                            <span class="label bg-red">Dart</span>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <i class="material-icons">phone</i>
                            Contact
                        </div>
                        <div class="content">
                            <p>E-mail: fozimata@gmail.com</p>
                            <p>Whatsapp: 0895 6295 07353</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-9">
        <div class="card">
            <div class="body">
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings"
                                role="tab" data-toggle="tab">Profile Settings</a></li>
                        <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab"
                                data-toggle="tab">Change Password</a></li>
                    </ul>

                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                            <form class="form-horizontal" action="{{ route('change-name') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="text"
                                                class="form-control @error('name') focused error @enderror" id="name"
                                                name="name" placeholder="Name " value="{{ auth()->user()->name }}">
                                        </div>
                                        @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="email"
                                                class="form-control @error('email') focused error @enderror" id="email"
                                                name="email" placeholder="email" value="{{ auth()->user()->email }}">
                                        </div>
                                        @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                            <form class="form-horizontal" action="{{ route('change-password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="current_password" class="col-sm-3 control-label">Old Password</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="password"
                                                class="form-control @error('current_password') focused error @enderror"
                                                id="current_password" name="current_password" placeholder="Old Password"
                                                required>
                                        </div>
                                        @error('current_password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_password" class="col-sm-3 control-label">New Password</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="password"
                                                class="form-control @error('new_password') focused error @enderror"
                                                id="new_password" name="new_password" placeholder="New Password"
                                                required>
                                        </div>
                                        @error('new_password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_confirm_password" class="col-sm-3 control-label">New Password
                                        (Confirm)</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="password"
                                                class="form-control @error('new_confirm_password') focused error @enderror"
                                                id="new_confirm_password" name="new_confirm_password"
                                                placeholder="New Password (Confirm)" required>
                                        </div>
                                        @error('new_confirm_password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-danger">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection