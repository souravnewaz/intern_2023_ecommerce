<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if(!Auth::validate($credentials)) {
            return redirect()->back()->with('error', 'Invalid credentials!');
        }

        $user = User::where('email', $credentials['email'])->first();

        if($user->role == 'admin') {
            return redirect()->back()->with('error', 'Please login as admin');
        }

        Auth::login($user);

        return redirect('/');
    }

    public function logout()
    {
        Session::flush();        
        Auth::logout();

        return redirect('/');
    }

    public function adminForm()
    {
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if($user->role != 'admin') {
            return redirect()->back()->with('error', 'You are not Admin!');
        }

        if(!Auth::validate($credentials)) {
            return redirect()->back()->with('error', 'Invalid credentials!');
        }

        Auth::login($user);

        session()->flash('success', 'Login successful');

        return redirect()->route('admin.dashboard');
    }
}
