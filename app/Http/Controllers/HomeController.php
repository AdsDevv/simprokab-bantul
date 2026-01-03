<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pengrajin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // === (Index dengan Pencarian & Pagination) ===
    public function index(Request $request)
    {
        // Ambil kata kunci dari kolom pencarian
        $query = $request->input('cari');

        //Ambil produk, filter jika ada pencarian
        $produks = Produk::with('pengrajin')
            ->when($query, function ($q) use ($query) {
                return $q->where('nama_produk', 'like', "%{$query}%")
                        ->orWhereHas('pengrajin', function ($subQ) use ($query) {
                            $subQ->where('nama_pengrajin', 'like', "%{$query}%");
            });
            })
            ->latest()     
            ->paginate(6); 

        return view('welcome', compact('produks'));
    }
    // =====================================================================

    // Halaman Detail Produk
    public function show($id)
    {
        $produk = Produk::with('pengrajin')->findOrFail($id);
        return view('public-show', compact('produk'));
    }

    // Halaman Daftar Pengrajin
    public function pengrajin()
    {
        $pengrajins = Pengrajin::all();
        return view('pengrajin-index', compact('pengrajins'));
    }

    // Halaman Detail Pengrajin
    public function pengrajinDetail($id)
    {
        $pengrajin = Pengrajin::with('produks')->findOrFail($id);
        return view('pengrajin-show', compact('pengrajin'));
    }

    // Halaman Tentang Kami
    public function about()
    {
        return view('about');
    }
}