@extends('layout.template')
@section('css', '/css/view_profile.css')
@section('title', 'Profile')

@section('content')
<div class="box">
    <div class="box-content">
        <img src="https://cdn-icons-png.flaticon.com/512/3237/3237472.png" alt="profile-img">
        <div class="form">
            <div class="form-item">
                <label for="name">Profile Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" disabled>
            </div>
            <div class="form-item">
                <label for="email">Profile Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" disabled>
            </div>
            <div class="form-item">
                <label for="address">Profile Address</label>
                <input type="text" name="address" id="address" value="{{ $user->address }}" disabled>
            </div>
            <a href="{{ route('edit_profile') }}">Edit Profile</a>
        </div>

    </div>
</div>
@endsection
