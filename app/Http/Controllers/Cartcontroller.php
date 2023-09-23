<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class Cartcontroller extends Controller
{
    public function index()
    {
        $carts = Cart::with('product.category')->where('user_id', auth()->user()->id)->get();

        return view('carts.index', compact('carts'));
    }

    public function store(Product $product)
    {
        if(!auth()->user()) {
            return redirect()->back()->with('error', 'Please login first!');
        }

        $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
        
        if($cart) {

            $cart->increment('quantity');
            $cart->save();
        }

        else {

            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Added to cart successfully');
    }

    public function delete(Cart $cart)
    {
        $cart->delete();

        return redirect()->back()->with('success', 'Item removed from cart successfully');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'address' => 'required|string|min:5|max:500'
        ]);
        
        $carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();

        $subtotal = 0;

        foreach($carts as $cart) {
            $total = $cart->product->price * $cart->quantity;
            $subtotal += $total;
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'subtotal' => $subtotal,
            'address' => $request->address
        ]);

        foreach($carts as $cart) {
            $order->items()->create([
                'product_id' => $cart->product->id,
                'price' => $cart->product->price,
                'quantity' => $cart->quantity,
                'total' => $cart->product->price * $cart->quantity
            ]);

            $cart->delete();
        }

        return redirect('/')->with('success', 'Order placed successfully');
    }
}
