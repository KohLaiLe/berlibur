<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index(){
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if ($cart == null){
            return view('cart.mycart', compact('user'));
        }

        $cartProducts = CartDetail::where('cart_id', $cart->id)->get();

        if (count($cartProducts) == 0){
            $cart->delete();
            return view('cart.mycart');
        }

        return view('cart.mycart', compact('cartProducts', 'user'));
    }

    public function add(Request $request){
        $request->validate([
            'quantity' => 'required | numeric | min:1'
        ]);
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if ($cart == null){
            $cart = new Cart();
            $cart->user_id = $user->id;

            $cart->save();
        }

        $product = Product::find($request->id);
        $cartProduct = CartDetail::where('product_id', $product->id)->where('cart_id', $cart->id)->first();

        if ($cartProduct == null){
            $cartProduct = new CartDetail();
            $cartProduct->cart_id = $cart->id;
            $cartProduct->product_id = $product->id;
            $cartProduct->quantity = $request->input('quantity');
        }
        elseif ($cartProduct->quantity + 1){
            $cartProduct->quantity++;
        }

        $cartProduct->save();

        return redirect()->route('index')->with('alert', 'Product added to cart.');
    }

    public function edit(Request $request){
        $user = Auth::user();
        $cartProduct = CartDetail::find($request->id);

        return view('cart.editproductcart', compact('cartProduct', 'user'));
    }

    public function update(Request $request){
        $request->validate([
           'quantity' => 'required | numeric | min:1'
        ]);

        $cartProduct = CartDetail::all()->find($request->id);
        $cartProduct->quantity = $request->input('quantity');
        $cartProduct->save();

        return redirect()->route('cart')->with('alert', 'Cart Updated.');
    }

    public function delete(Request $request){
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cartProducts = CartDetail::where('cart_id', $cart->id)->get();
        CartDetail::destroy($request->id);

        if (count($cartProducts) == 1){
            $cart->delete();
            return view('cart.mycart', compact('user'))->with('alert', 'item deleted.');
        }

        return redirect()->back()->with('alert', 'item deleted.');
    }
}
