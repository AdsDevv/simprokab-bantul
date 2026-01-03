@extends('layouts.admin')

@section('title', 'Detail Pengrajin')

@section('content')
    <div class="max-w-5xl mx-auto">
        
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('pengrajins.index') }}" class="text-coklat-tua hover:underline font-semibold flex items-center">
                &larr; Kembali ke Daftar
            </a>
            
            <div class="flex gap-3">
                <a href="{{ route('pengrajins.edit', $pengrajin->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition">
                    ✏️ Edit Data
                </a>
                
                <form action="{{ route('pengrajins.destroy', $pengrajin->id) }}" method="POST" onsubmit="return confirm('Yakin hapus pengrajin ini? Semua produk buatannya juga akan terhapus!')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded shadow hover:bg-red-700 transition">
                        🗑️ Hapus Pengrajin
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden mb-8 border border-gray-100">
            <div class="bg-coklat-tua px-8 py-6 text-white flex justify-between items-center">
                <div>
                    <h2 class="text-3xl font-bold">{{ $pengrajin->nama_pengrajin }}</h2>
                    <p class="text-coklat-muda mt-1">Spesialisasi: {{ $pengrajin->jenis_kerajinan }}</p>
                </div>
                <div class="text-5xl opacity-20">👥</div>
            </div>
            
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex items-start gap-4">
                    <div class="bg-orange-100 p-3 rounded-full text-coklat-tua">📞</div>
                    <div>
                        <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider">Nomor Kontak</h3>
                        <p class="text-xl text-gray-800 font-semibold mt-1">{{ $pengrajin->kontak }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="bg-orange-100 p-3 rounded-full text-coklat-tua">📍</div>
                    <div>
                        <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider">Alamat Lengkap</h3>
                        <p class="text-xl text-gray-800 font-semibold mt-1">{{ $pengrajin->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t pt-6">
            <h3 class="text-2xl font-bold text-coklat-tua mb-4">Katalog Produk {{ $pengrajin->nama_pengrajin }}</h3>
            
            @if($pengrajin->produks->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($pengrajin->produks as $produk)
                        <div class="bg-white rounded-lg shadow hover:shadow-xl transition duration-300 border border-gray-100 flex flex-col h-full">
                            <div class="h-48 bg-gray-200 w-full relative">
                                @if($produk->foto)
                                    <img src="{{ asset('storage/' . $produk->foto) }}" class="w-full h-full object-cover rounded-t-lg">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                                @endif
                                <div class="absolute top-2 right-2 bg-white px-2 py-1 text-xs font-bold rounded shadow text-coklat-gelap">
                                    Stok: {{ $produk->stok }}
                                </div>
                            </div>

                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="font-bold text-lg text-gray-800 mb-1 leading-tight">{{ $produk->nama_produk }}</h4>
                                    <p class="text-coklat-tua font-bold text-lg">Rp {{ number_format($produk->harga) }}</p>
                                </div>
                                <div class="mt-4 pt-3 border-t text-center">
                                    <a href="{{ route('produks.show', $produk->id) }}" class="text-sm text-blue-600 hover:text-blue-800 font-semibold">
                                        Lihat Produk &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-orange-50 text-orange-800 p-6 rounded-lg text-center border border-orange-200">
                    <p class="font-bold">Belum ada produk.</p>
                    <p class="text-sm">Silakan tambahkan produk baru dan pilih pengrajin ini.</p>
                </div>
            @endif
        </div>
    </div>
@endsection