<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|unique:products,name',
            'description' => 'required|string|max:1000',
            'regular_price' => 'nullable|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $path = 'images/products';
        $request->image->move(public_path($path), $imageName);
        
        $input['image'] = $path . '/'. $imageName;
        $input['slug'] = \Str::slug($request->name);

        Product::create($input);

        return redirect()->back()->with('success', 'Product Added Successfully');
    }

    public function edit(Product $product)
    {
        $categories = Category::get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Product $product, Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|unique:products,name,'.$product->id,
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'regular_price' => 'nullable|numeric',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        if($request->hasFile('image')) {
            
            $imageName = time().'.'.$request->image->extension();
            $path = 'images/products';
            $request->image->move(public_path($path), $imageName);

            unlink(public_path($product->image));
            $input['image'] = $path . '/'. $imageName;
        }

        if($request->name != $product->name) {
            $input['slug'] = \Str::slug($request->name);
        }

        $product->update($input);

        return redirect()->back()->with('success', 'Product updated Successfully');
    }
}
