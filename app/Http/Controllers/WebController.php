<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WebController extends Controller
{
    public function index(){
        $user = Auth::user();
        $products = Product::paginate(6);

        return view('home', compact('user','products'));
    }
}
