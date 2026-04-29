<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === '123') {

            // session login
            session(['user' => $username]);

            // biar session dianggap "login"
            session(['logged_in' => true]);

            // remember me
            if ($request->has('remember')) {
                Cookie::queue('username', $username, 60 * 24 * 7);
            }

            return redirect('/');

        } else {
            return redirect('/login')->with('error', 'Login gagal. Username atau password salah.');
        }
    }

    public function logout()
    {
        session()->flush();
        Cookie::queue(Cookie::forget('username'));

        return redirect('/login');
    }
}