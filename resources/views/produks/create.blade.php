@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-coklat-tua">Tambah Produk Baru</h2>

        {{-- enctype WAJIB ADA jika ada upload file --}}
        <form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nama Produk</label>
                <input type="text" name="nama_produk" class="w-full border p-2 rounded focus:ring ring-coklat-sedang" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Pilih Pengrajin</label>
                <select name="pengrajin_id" class="w-full border p-2 rounded focus:ring ring-coklat-sedang" required>
                    <option value="">-- Pilih Pengrajin --</option>
                    @foreach($pengrajins as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_pengrajin }} ({{ $p->jenis_kerajinan }})</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 mb-2">Harga (Rp)</label>
                    <input type="number" name="harga" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Stok</label>
                    <input type="number" name="stok" class="w-full border p-2 rounded" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full border p-2 rounded"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Foto Produk</label>
                <input type="file" name="foto" class="w-full border p-2 rounded bg-gray-50">
                <p class="text-xs text-gray-500 mt-1">*Format: JPG/PNG, Maks 2MB</p>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('produks.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-coklat-tua text-white rounded hover:bg-coklat-gelap">Simpan Produk</button>
            </div>
        </form>
    </div>
@endsection