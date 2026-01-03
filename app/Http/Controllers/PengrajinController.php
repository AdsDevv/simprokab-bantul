<?php

namespace App\Http\Controllers;

use App\Models\Pengrajin;
use Illuminate\Http\Request;

class PengrajinController extends Controller
{
    public function index()
    {
        $pengrajins = Pengrajin::all();
        return view('pengrajins.index', compact('pengrajins'));
    }

    public function create()
    {
        return view('pengrajins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengrajin' => 'required',
            'jenis_kerajinan' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
        ]);

        Pengrajin::create($request->all());

        return redirect()->route('pengrajins.index')->with('success', 'Data Pengrajin berhasil ditambahkan!');
    }

    public function show(Pengrajin $pengrajin)
    {
        return view('pengrajins.show', compact('pengrajin'));
    }

    public function edit(Pengrajin $pengrajin)
    {
        return view('pengrajins.edit', compact('pengrajin'));
    }

    public function update(Request $request, Pengrajin $pengrajin)
    {
        $request->validate([
            'nama_pengrajin' => 'required',
            'jenis_kerajinan' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
        ]);

        $pengrajin->update($request->all());

        return redirect()->route('pengrajins.index')->with('success', 'Data Pengrajin berhasil diperbarui!');
    }

    public function destroy(Pengrajin $pengrajin)
    {
        $pengrajin->delete();
        return redirect()->route('pengrajins.index')->with('success', 'Data Pengrajin berhasil dihapus!');
    }
}