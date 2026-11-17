<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function create()
    {
        return view('auth.login');
    }

    // Memproses login
    public function store(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Memeriksa email dan password
        if (Auth::attempt($credentials)) {

            // Memperbarui session setelah login
            $request->session()->regenerate();

            // Mengarahkan pengguna ke dashboard
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
        ])->onlyInput('email');
    }
    // Memproses logout
public function destroy(Request $request)
{
    Auth::logout();

    // Menghapus session pengguna
    $request->session()->invalidate();

    // Membuat token CSRF baru
    $request->session()->regenerateToken();

    // Kembali ke halaman login
    return redirect()->route('login');
    }
}