<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function showRegister()
    {
        if (session()->has('user')) return redirect()->route('home');
        return view('register');
    }

    public function store(Request $request)
    {
        // ── 1. Validasi reCAPTCHA ──────────────────────────────────────────
        $recaptcha = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$recaptcha->successful() || !$recaptcha->json()['success']) {
            return back()
                ->withErrors(['g-recaptcha-response' => 'Validasi reCAPTCHA gagal! Anda robot?'])
                ->withInput();
        }

        // ── 2. Validasi input ──────────────────────────────────────────────
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // ── 3. Simpan ke database ──────────────────────────────────────────
        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}