<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard()->attempt($credentials)) {
            return redirect()->intended('/')->with('success', 'Login Successfully.');
        }
        return redirect()->back()->with('delete',  'These credentials do not match our records!');

    }

    public function userRegister(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'number' => [
                'required',
                'digits:10',  
            ],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number' => $request->number,
            'role' => 'user'
    
        ]);


        Auth::guard()->login($user);

        // Redirect to customer dashboard or any other route
        return redirect()->intended('/')->with('success', 'Login Successfully.');
    }


    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('/')->with('delete', 'Logout successfully');
    }

}
