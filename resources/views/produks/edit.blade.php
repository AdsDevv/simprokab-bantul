@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-coklat-tua">Edit Produk</h2>

        <form action="{{ route('produks.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{--untuk Update --}}
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="w-full border p-2 rounded focus:ring ring-coklat-sedang" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Pilih Pengrajin</label>
                <select name="pengrajin_id" class="w-full border p-2 rounded focus:ring ring-coklat-sedang" required>
                    <option value="">-- Pilih Pengrajin --</option>
                    @foreach($pengrajins as $p)
                        {{-- Logika: Jika ID pengrajin sama dengan yang tersimpan, maka pilih (selected) --}}
                        <option value="{{ $p->id }}" {{ $produk->pengrajin_id == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_pengrajin }} ({{ $p->jenis_kerajinan }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 mb-2">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ $produk->harga }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Stok</label>
                    <input type="number" name="stok" value="{{ $produk->stok }}" class="w-full border p-2 rounded" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full border p-2 rounded">{{ $produk->deskripsi }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Foto Produk (Biarkan kosong jika tidak ganti)</label>
                {{-- Tampilkan foto lama jika ada --}}
                @if($produk->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $produk->foto) }}" class="w-20 h-20 object-cover rounded border">
                        <p class="text-xs text-gray-500">Foto saat ini</p>
                    </div>
                @endif
                <input type="file" name="foto" class="w-full border p-2 rounded bg-gray-50">
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('produks.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-coklat-tua text-white rounded hover:bg-coklat-gelap">Update Produk</button>
            </div>
        </form>
    </div>
@endsection