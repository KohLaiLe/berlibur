<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){
        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)->get();

        return view('transaction.transactionhistory', compact('transactions', 'user'));
    }

    public function checkout(Request $request){
        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)->first();
        $cartProducts = CartDetail::where('cart_id', $cart->id)->get();

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->save();

        foreach ($cartProducts as $cartProduct){
            $transactionProduct = new TransactionDetail();
            $transactionProduct->transaction_id = $transaction->id;
            $transactionProduct->product_id = $cartProduct->product->id;
            $transactionProduct->quantity = $cartProduct->quantity;

            $transactionProduct->save();

            $cartProduct->delete();
        }

        $cart->delete();

        return redirect()->route('history')->with('alert', 'Transaction successful. Thank you.');
    }
}
