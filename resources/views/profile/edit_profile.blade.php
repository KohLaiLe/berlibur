@extends('layout.template')
@section('css', '/css/edit_profile.css')
@section('title', 'Profile')

@section('content')
<div class="box">
    <div class="box-content">
        <img src="https://cdn-icons-png.flaticon.com/512/3237/3237472.png" alt="profile-img">
        <form action="{{ route('update_profile') }}" method="post">
            @csrf
            <div class="form-item">
                <label for="name">Profile Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="form-item">
                <label for="email">Profile Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}">
            </div>
            <div class="form-item">
                <label for="address">Profile Address</label>
                <input type="text" name="address" id="address" value="{{ $user->address }}">
            </div>
            <div class="form-item">
                <label for="password">New Password(Can be left empty)</label>
                <input type="password" name="password" id="password" placeholder="New Password">
            </div>
            <div class="form-item">
                <label for="current">Current Password</label>
                <input type="password" name="current" id="current" placeholder="Old Password">
            </div>
            <button class="edit_profile" type="submit">Update Profile</button>
        </form>
        <a href="{{ route('show_profile') }}">Cancel</a>
        @if($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach($errors->all() as $error_data)
                        <li> {{ $error_data }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection
