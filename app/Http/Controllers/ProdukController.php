<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pengrajin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Tampilkan Daftar Produk
    public function index()
    {
        // Ambil data produk beserta data pengrajinnya (Eager Loading)
        $produks = Produk::with('pengrajin')->get();
        return view('produks.index', compact('produks'));
    }

    // Form Tambah (Kirim data pengrajin untuk dropdown)
    public function create()
    {
        $pengrajins = Pengrajin::all();
        return view('produks.create', compact('pengrajins'));
    }

    // Simpan Produk (Termasuk Upload Foto)
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'pengrajin_id' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048' // Validasi foto
        ]);

        $data = $request->all();

        // Cek user upload foto
        if ($request->hasFile('foto')) {
            // Simpan foto ke folder 'public/produks'
            $path = $request->file('foto')->store('produks', 'public');
            $data['foto'] = $path;
        }

        Produk::create($data);

        return redirect()->route('produks.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Form Edit
    public function edit(Produk $produk)
    {
        $pengrajins = Pengrajin::all();
        return view('produks.edit', compact('produk', 'pengrajins'));
    }

    // Update Produk
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'pengrajin_id' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        // Logika ganti foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama 
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            // Upload foto baru
            $data['foto'] = $request->file('foto')->store('produks', 'public');
        }

        $produk->update($data);

        return redirect()->route('produks.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // FUNGSI DETAIL PRODUK
    public function show(Produk $produk)
    {
        return view('produks.show', compact('produk'));
    }

    // Hapus Produk
    public function destroy(Produk $produk)
    {
        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }
        $produk->delete();
        return redirect()->route('produks.index')->with('success', 'Produk dihapus!');
    }
}
