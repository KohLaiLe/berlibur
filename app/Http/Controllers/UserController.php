<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index_register(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'confirm' => 'required|same:password',
            'address' => 'required|min:5',
            'gender' => 'required',
            'terms' => 'required'
        ]);
        $user = new User();
        $user->name =$request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        $user->role = 'Member';
        $user->save();

        return redirect()->route('index_login');
    }

    public function show(){
        $user = Auth::user();
        return view('profile.view_profile', compact('user'));
    }

    public function edit_page(){
        $user = Auth::user();
        return view('profile.edit_profile', compact('user'));
    }

    public function update_profile(Request $request){
        $request->validate([
           'name' => 'required|min:5',
           'email' => 'required|email|unique:users,email',
           'address' => 'required|min:5',
            'current' => 'required'
        ]);

        $user = User::all()->find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        if ($request->input('password') != null){
            $request->validate([
               'password' => 'min:5'
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('show_profile')->with('alert', 'Profile successful updated.');
    }

}
