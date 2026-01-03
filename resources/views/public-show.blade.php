@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <a href="/" class="text-coklat-tua hover:underline mb-4 inline-block font-semibold">&larr; Kembali ke Katalog</a>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-0 border border-gray-100">
        <div class="bg-gray-100 p-6 flex items-center justify-center">
            @if($produk->foto)
                <img src="{{ asset('storage/' . $produk->foto) }}" class="max-h-[500px] w-full object-contain rounded-lg shadow-sm">
            @else
                <div class="h-64 flex items-center justify-center text-gray-400 text-xl">Tidak ada foto</div>
            @endif
        </div>

        <div class="p-8 md:p-12 flex flex-col justify-center">
            <span class="text-sm font-bold text-coklat-sedang uppercase tracking-widest mb-2">
                {{ $produk->pengrajin->jenis_kerajinan }}
            </span>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">{{ $produk->nama_produk }}</h1>
            
            <div class="text-3xl font-bold text-coklat-tua mb-6">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </div>

            <div class="prose text-gray-600 mb-8 leading-relaxed">
                <h3 class="font-bold text-gray-800 mb-2">Deskripsi Produk:</h3>
                <p>{{ $produk->deskripsi ?? 'Tidak ada deskripsi detail.' }}</p>
            </div>

            <div class="bg-coklat-krem p-4 rounded-xl mb-8 flex items-center gap-4 border border-coklat-muda/30">
                <div class="w-12 h-12 bg-coklat-tua rounded-full flex items-center justify-center text-white font-bold text-xl">
                    {{ substr($produk->pengrajin->nama_pengrajin, 0, 1) }}
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase font-bold">Dibuat Oleh:</p>
                    <p class="font-bold text-gray-900">{{ $produk->pengrajin->nama_pengrajin }}</p>
                    <p class="text-xs text-gray-600">{{ $produk->pengrajin->alamat }}</p>
                </div>
            </div>

            <a href="https://wa.me/{{ $produk->pengrajin->kontak }}?text=Halo, saya tertarik dengan produk {{ $produk->nama_produk }}" target="_blank" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-xl text-center transition flex items-center justify-center gap-2 shadow-lg hover:shadow-xl hover:-translate-y-1">
                <span class="text-xl">💬</span> Hubungi Pengrajin (WhatsApp)
            </a>
        </div>
    </div>
</div>
@endsection