<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')->where('user_id', auth()->user()->id)->get();

        return view('orders.index', compact('orders'));
    }
}
