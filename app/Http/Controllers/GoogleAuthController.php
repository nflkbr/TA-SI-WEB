<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    /**
     * Redirect pengguna ke halaman login Google.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Tangani callback dari Google setelah login berhasil.
     */
    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Cek apakah user sudah ada; jika belum, buat baru
        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name'      => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
            ]
        );

        // Login menggunakan Auth Laravel (bukan session manual)
        Auth::login($user);

        // Simpan juga ke session manual agar kompatibel dengan AuthController
        session(['user' => $user->name]);

        return redirect()->route('home');
    }
}