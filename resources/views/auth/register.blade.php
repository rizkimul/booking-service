{{-- <h1>{{ $title }}</h1>
<form action="/register" method="POST">
    @csrf
    <input type="text" name="username"  id="username" placeholder="username" required value="{{ old('username') }}"> <br> <br>
    <input type="password" name="password" id="password" placeholder="password" required> <br> <br>
    <select name="usertype" id="usertype" required>
        <option selected>Admin</option>
        <option>Super Admin</option>
    </select><br> <br>
    <input type="text" name="fullname" id="fullname" placeholder="fullname" required value="{{ old('fullname') }}"> <br> <br>
    <button type="submit">Register</button>
</form>

<small>Already registered? <a href="/login">Login</a></small> --}}

@extends('layouts.layouts_login')

@section('sections')

<div class="card card-primary">
    <div class="card-header">
        <h4>Register</h4>
    </div>

    @if (session('LoginError'))
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
        <strong>{{ session('LoginError') }}</strong>
        </div>
    </div>
    {{-- <h6 class="alert alert-danger">
        {{ session('LoginError') }}
    </h6> --}}
    @endif

    <div class="card-body">
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                    name="username" tabindex="1" placeholder="Username" required autofocus>
                @error('username')
                <div class="invalid-feedback">
                    {{ 'Please fill in your username' }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                    name="email" tabindex="1" placeholder="Email" required autofocus>
                @error('email')
                <div class="invalid-feedback">
                    {{ 'Please fill in your email' }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror"
                    name="phoneNumber" tabindex="1" placeholder="Phone Number" required autofocus>
                @error('phoneNumber')
                <div class="invalid-feedback">
                    {{ 'Please fill in your phone number' }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input id="fullName" type="text" class="form-control @error('fullName') is-invalid @enderror"
                    name="fullName" tabindex="1" placeholder="Full Name" required autofocus>
                @error('fullName')
                <div class="invalid-feedback">
                    {{ 'Please fill in your full name' }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" tabindex="2" placeholder="Password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ 'please fill in your password' }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Register
                </button>
            </div>
        </form>
        <div class="mt-5 text-muted text-center">
            Already register? <a href="/login">Login</a>
        </div>

    </div>
</div>

@endsection
