<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.index')->with('success', 'Admin Login Successfully.');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'Unauthorized access.');
            }
        }
        return redirect()->back()->with('error', 'Invalid credentials.');
    }

    public function adminRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'name' => 'required|string|max:255',
        ]);

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        Auth::login($admin);

        return redirect()->route('admin.index')->with('success', 'Admin Registered Successfully.');
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Logout successful.');
    }
}
