<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::get();
        $products = Product::query();

        if($request->has('category')) $products->where('category_id', $request->category);
        if($request->has('product')) {
            $name = $request->product;
            $products->where('name', $name)
                ->orWhere('name', 'LIKE', $name . '%')
                ->orWhere('name', 'LIKE', '%' . $name . '%');
        }

        $products = $products->get();

        return view('home', compact('products', 'categories'));
    }
}
