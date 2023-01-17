<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index_login(Request $request){
        $email = $request->cookie('user_email');
        return view('auth.login', compact('email'));
    }

    public function login(Request $request){
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credential, $request->input('remember'))){
            return redirect()->back()->withErrors('Account not found.');
        }

        if($request->has('remember')){
            $expired_time = 60*2; // 2 hours
            Cookie::queue("user_email", $request->email, $expired_time);
        }

        return redirect()->route('index');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index_login');
    }

}
