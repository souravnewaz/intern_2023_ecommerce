<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $input = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|min:7|max:15',
            'password' => 'required|min:6|confirmed',
        ]);

        $input['role'] = 'user';

        $user = User::create($input);

        Auth::login($user);

        Session::flash('success', 'Register Successfully');

        return redirect()->route('home');
    }
}
