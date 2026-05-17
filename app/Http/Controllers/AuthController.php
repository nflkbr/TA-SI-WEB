<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) return redirect()->route('home'); // ← ganti ini
        return view('login');
    }

    public function login(Request $request)
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

        // ── 2. & 3. Attempt login ──────────────────────────────────────────
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->with('error', 'Email atau Password salah!');
        }

        // ── 4. Regenerate session (keamanan) ───────────────────────────────
        $request->session()->regenerate();
        return redirect()->intended(route('home'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();      // ← hapus semua data session
        $request->session()->regenerateToken(); // ← cegah CSRF token lama
        return redirect()->route('login');
    }
}