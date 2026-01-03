@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    
    <div class="mb-6">
        <a href="{{ route('public.pengrajin') }}" class="text-coklat-tua hover:underline font-semibold flex items-center gap-2">
            &larr; Kembali ke Direktori Pengrajin
        </a>
    </div>
    <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 border-t-4 border-coklat-tua flex flex-col md:flex-row items-center gap-6">
        <div class="w-24 h-24 bg-coklat-muda text-coklat-gelap rounded-full flex items-center justify-center text-4xl font-bold">
            {{ substr($pengrajin->nama_pengrajin, 0, 1) }}
        </div>
        <div class="text-center md:text-left flex-1">
            <h1 class="text-3xl font-bold text-gray-900">{{ $pengrajin->nama_pengrajin }}</h1>
            <p class="text-coklat-sedang font-bold uppercase tracking-wide mt-1">{{ $pengrajin->jenis_kerajinan }}</p>
            <p class="text-gray-600 mt-2 max-w-2xl">{{ $pengrajin->alamat }}</p>
        </div>
        <div>
            <a href="https://wa.me/{{ $pengrajin->kontak }}" target="_blank" class="bg-green-600 text-white px-6 py-3 rounded-full font-bold hover:bg-green-700 transition flex items-center gap-2 shadow">
                <span>📞</span> Hubungi Pengrajin
            </a>
        </div>
    </div>

    <h2 class="text-2xl font-bold text-coklat-tua mb-6">Koleksi Produk {{ $pengrajin->nama_pengrajin }}</h2>
    
    @if($pengrajin->produks->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($pengrajin->produks as $produk)
                <a href="{{ route('public.show', $produk->id) }}" class="bg-white rounded-lg shadow hover:shadow-md transition overflow-hidden border border-gray-100 block">
                    <div class="h-48 bg-gray-200">
                        @if($produk->foto)
                            <img src="{{ asset('storage/' . $produk->foto) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 truncate">{{ $produk->nama_produk }}</h3>
                        <p class="text-coklat-tua font-bold">Rp {{ number_format($produk->harga) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="bg-gray-100 p-8 text-center rounded-lg text-gray-500">
            Belum ada produk yang ditampilkan.
        </div>
    @endif
</div>
@endsection