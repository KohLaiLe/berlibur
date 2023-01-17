@extends('layout.template')
@section('css', '/css/register.css')
@section('title', 'Register')

@section('content')
<div class="box">
    <div class="box-content">
        <h1>Create an Account</h1>
        @if($errors->any())
            <div class="alert alert-danger my-2 p-3">
                <ul>
                    @foreach($errors->all() as $error_data)
                        <li> {{ $error_data }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-item">
                <label for="name">Your Name</label>
                <input type="text" name="name" id="name" autocomplete="off">
            </div>
            <div class="form-item">
                <label for="email">Your Email</label>
                <input type="email" name="email" id="email" autocomplete="off">
            </div>
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-item">
                <label for="confirm">Repeat your Password</label>
                <input type="password" name="confirm" id="confirm">
            </div>
            <div class="form-item">
                <label for="address">Your Address</label>
                <input type="text" name="address" id="address" autocomplete="off">
            </div>
            <div class="form-item">
                <p id="radio-title">Your Gender</p>
                <input type="radio" name="gender" id="male" value="Male">
                <label for="gender" id="male-label">Male</label>
                <input type="radio" name="gender" id="female" value="Female">
                <label for="gender" id="female">Female</label>
            </div>
            <div class="form-item">
                <input type="checkbox" name="terms" id="terms">
                <label for="checkbox">I agree all statements in <a href="#">Term of service</a></label>
            </div>
            <button class="register-submit-button" type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="/auth/login">Login here</a></p>
    </div>
</div>
@endsection
