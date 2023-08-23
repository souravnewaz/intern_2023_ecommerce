<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::when(request()->sort, function($query){
            $query->orderBy('id', request()->sort);
        })->with('items.product', 'user')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Order updated successfully');
    }
}
