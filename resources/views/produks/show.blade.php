@extends('layouts.admin')

@section('title', 'Detail Produk')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('produks.index') }}" class="flex items-center text-coklat-tua hover:text-coklat-gelap transition font-semibold">
                &larr; Kembali ke Daftar Produk
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div class="md:flex">
                <div class="md:w-1/2 bg-gray-100 flex items-center justify-center p-4">
                    @if($produk->foto)
                        <img class="h-80 w-full object-cover rounded-lg shadow-sm" src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}">
                    @else
                        <div class="h-80 w-full flex flex-col items-center justify-center text-gray-400 bg-gray-200 rounded-lg">
                            <span class="text-4xl mb-2">📷</span>
                            <span>Tidak ada foto</span>
                        </div>
                    @endif
                </div>

                <div class="p-8 md:w-1/2 flex flex-col justify-between">
                    <div>
                        <div class="uppercase tracking-wide text-sm text-coklat-sedang font-bold">
                            Kategori: {{ $produk->pengrajin->jenis_kerajinan }}
                        </div>
                        
                        <h1 class="block mt-1 text-3xl leading-tight font-extrabold text-coklat-tua">
                            {{ $produk->nama_produk }}
                        </h1>
                        
                        <p class="mt-4 text-gray-600 leading-relaxed">
                            {{ $produk->deskripsi ?? 'Tidak ada deskripsi untuk produk ini.' }}
                        </p>

                        <div class="mt-6">
                            <span class="text-gray-500 text-sm">Harga Satuan:</span>
                            <div class="text-3xl font-bold text-coklat-gelap">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="mt-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                Stok Tersedia: {{ $produk->stok }} pcs
                            </span>
                        </div>
                    </div>

                    <div class="mt-8 border-t pt-4">
                        <p class="text-sm text-gray-500 mb-1">Dibuat oleh Pengrajin:</p>
                        <a href="{{ route('pengrajins.show', $produk->pengrajin_id) }}" class="flex items-center group">
                            <div class="w-10 h-10 rounded-full bg-coklat-muda flex items-center justify-center text-white font-bold text-lg">
                                {{ substr($produk->pengrajin->nama_pengrajin, 0, 1) }}
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-bold text-gray-900 group-hover:text-coklat-tua transition">{{ $produk->pengrajin->nama_pengrajin }}</p>
                                <p class="text-xs text-gray-500">{{ $produk->pengrajin->alamat }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-6 flex justify-end gap-3">
            <a href="{{ route('produks.edit', $produk->id) }}" class="px-6 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition">
                Edit Produk
            </a>
            <form action="{{ route('produks.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                @csrf
                @method('DELETE')
                <button class="px-6 py-2 bg-red-600 text-white rounded shadow hover:bg-red-700 transition">
                    Hapus Produk
                </button>
            </form>
        </div>
    </div>
@endsection