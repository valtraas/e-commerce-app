<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index($token)
    {

        return view('login.index', [
            'title' => 'Teknorithm | Login',
            'token' => $token
        ]);
    }

    public function auth(Request $request)
    {
        $messages = [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password harus memiliki minimal 8 karakter',
            'password.max' => 'password tidak boleh lebih dari 225 karakter'
        ];
        $validate = $request->validate([
            'username' => 'required',
            'password' => ['required', 'min:8', 'max:225']
        ], $messages);
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            notify()->emotify('success', 'Selamat Datang ' . $request->input('username'));
            return redirect()->intended('/dashboard');
        }
        notify()->error('Login Error, periksa username dan password');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
