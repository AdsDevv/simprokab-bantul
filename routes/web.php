<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengrajinController;
use App\Http\Controllers\ProdukController;
use App\Models\Pengrajin;
use App\Models\Produk;

// === HALAMAN PUBLIK ===
Route::get('/', [HomeController::class, 'index'])->name('public.index'); // Saya ubah nama jadi public.index agar sinkron dengan Controller
Route::get('/produk/{id}', [HomeController::class, 'show'])->name('public.show');

// PENGRAJIN:
Route::get('/pengrajin', [HomeController::class, 'pengrajin'])->name('public.pengrajin');
Route::get('/pengrajin/{id}', [HomeController::class, 'pengrajinDetail'])->name('public.pengrajin.show');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('public.about');

// === AUTHENTICATION ===
// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Register 
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// === ADMIN AREA ===
Route::middleware('auth')->group(function () {
    
    // Dashboard dengan Pengecekan Role Admin
    Route::get('/dashboard', function () {
        
        // LOGIKA PENGAMAN: 
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }

        $totalPengrajin = Pengrajin::count();
        $totalProduk = Produk::count();
        return view('dashboard', compact('totalPengrajin', 'totalProduk'));
    })->name('dashboard');

    // Resource Controller (Kelola Data)
    Route::resource('pengrajins', PengrajinController::class);
    Route::resource('produks', ProdukController::class);
});