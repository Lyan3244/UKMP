<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Product;


class OrderController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if($carts == null)
        {
            return Redirect::back();
        }

        $order = Order::create([
            'user_id'=>$user_id,
        ]);

        foreach ($carts as $cart) {
            Transaction::create([
                'order_id'=> $order->id,
                'amount'=> $cart->amount,
                'product_id'=> $cart->product_id
            ]);
        }

        return Redirect::route('show_order', $order);
    }

    public function index_order()
    {
        $orders = Order::all();
        return view('index_order', compact('orders'));
    }

    public function index_order_riwayat()
    {
        $orders = Order::all();
        return view('index_order_riwayat', compact('orders'));
    }

    public function show_order_riwayat(Order $order)
    {
        return view('show_order_riwayat', compact('order'));
    }

    public function show_order(Order $order)
    {
        return view('show_order', compact('order'));
    }

    public function submit_payment_receipt(Order $order, Request $request)
    {
        $file = $request->file('payment_receipt');
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/'.$path, file_get_contents($file));

        $order->update([
            'payment_receipt'=>$path
        ]);

        return Redirect::back();
    }
    public function confirm_payment(Order $order)
    {
        $order->update([
            'is_paid'=>true
        ]);

        return Redirect::back();
    }
}