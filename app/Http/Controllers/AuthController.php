<?php

namespace App\Http\Controllers;

use App\Models\User; // Tambahkan ini agar bisa buat User baru
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk password

class AuthController extends Controller
{
    // 1. Tampilkan Form Login
    public function showLoginForm() {
        return view('auth.login');
    }

    // 2. Proses Login (DENGAN LOGIKA PEMBEDA ROLE)
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // --- LOGIKA BARU: CEK ROLE ---
            // Jika role-nya admin, lempar ke Dashboard
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('dashboard'); 
            }

            // Jika role-nya user biasa, lempar ke Halaman Utama (Public)
            return redirect()->intended('/'); 
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }

    // 3. Tampilkan Form Register (BARU - Tambahan)
    public function showRegisterForm() {
        return view('auth.register');
    }

    // 4. Proses Register (BARU - Tambahan)
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' butuh input name="password_confirmation"
        ]);

        // Buat User Baru (Otomatis jadi 'user')
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Paksa jadi user biasa
        ]);

        // Setelah daftar, langsung arahkan ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // 5. Proses Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('status', 'Anda berhasil logout.');
    }
}