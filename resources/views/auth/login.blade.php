@extends('layout.template')
@section('css', '/css/login.css')
@section('title', 'Login')

@section('content')
<div class="login-body-container p-5">
    <div class="login-body-content">
        <div class="row">
            <div class="col login-body-rightside">
            </div>
            <div class="col login-body-leftside py-5 px-5">
                <div class="login-gadgeton-text mb-3">
                    <img class="navbar-brand" src="{{ url('/assets/berlibur.png') }}" alt="berlibur.png" style="width: 256px;">
                </div>
                <h5 class="login-signin-text mb-4">Sign in to your account</h5>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-item">
                        <label for="name">Email Address</label>
                        <input class="ps-3" type="email" name="email" id="email" autocomplete="off">
                    </div>
                    <div class="form-item">
                        <label for="name">Password</label>
                        <input class="ps-3" type="password" name="password" id="password">
                    </div>
                    <div class="form-item">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                    <button class="login-button" type="submit">
                        Login
                    </button>
                </form>
                <p>Don't have an account? <a class="login-registernow" href="/auth/register">Register here</a></p>
                @if($errors->any())
                    <div class="alert alert-danger my-2 p-3">
                        <ul>
                            @foreach($errors->all() as $error_data)
                                <li> {{ $error_data }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
