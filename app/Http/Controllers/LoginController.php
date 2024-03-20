<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Exception\Auth\InvalidPassword;
use Kreait\Firebase\Exception\Auth\UserNotFound;


class LoginController extends Controller
{   
    public function showLoginForm()
{
    return view('auth.login');
}
 
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, redirect ke halaman dashboard
            return redirect()->intended('/dashboard');
        }

        // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
        return redirect('/login')->with('error', 'Invalid credentials');
    }
    
}
