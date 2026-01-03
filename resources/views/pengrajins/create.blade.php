@extends('layouts.admin')

@section('title', 'Tambah Pengrajin')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-coklat-tua">Form Tambah Pengrajin</h2>

        <form action="{{ route('pengrajins.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nama Pengrajin</label>
                <input type="text" name="nama_pengrajin" class="w-full border p-2 rounded focus:ring ring-coklat-sedang" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Jenis Kerajinan</label>
                <input type="text" name="jenis_kerajinan" class="w-full border p-2 rounded focus:ring ring-coklat-sedang" placeholder="Contoh: Batik, Gerabah..." required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nomor Kontak</label>
                <input type="text" name="kontak" class="w-full border p-2 rounded focus:ring ring-coklat-sedang" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Alamat Lengkap</label>
                <textarea name="alamat" rows="3" class="w-full border p-2 rounded focus:ring ring-coklat-sedang" required></textarea>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('pengrajins.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-coklat-tua text-white rounded hover:bg-coklat-gelap">Simpan Data</button>
            </div>
        </form>
    </div>
@endsection