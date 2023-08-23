<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['customers'] = User::where('role', 'user')->count();
        $data['products'] = Product::count();
        $data['orders'] = Order::count();

        return view('admin.dashboard', compact('data'));
    }
}
