@extends('layouts.admin')

@section('title', 'Data Produk')

@section('content')
    <div class="mb-4 flex flex-col md:flex-row justify-between md:items-center gap-4">
        <h2 class="text-2xl font-bold text-coklat-tua font-serif">Daftar Produk Kerajinan</h2>
        <a href="{{ route('produks.create') }}" class="bg-coklat-tua text-white px-6 py-2 rounded-full hover:bg-coklat-gelap transition font-bold text-sm text-center shadow-md">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm font-semibold">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
        
        <div class="overflow-x-auto">
            <table class="min-w-[800px] leading-normal w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-4 border-b-2 border-coklat-muda bg-coklat-krem text-left text-xs font-bold text-coklat-tua uppercase tracking-wider">Foto</th>
                        <th class="px-6 py-4 border-b-2 border-coklat-muda bg-coklat-krem text-left text-xs font-bold text-coklat-tua uppercase tracking-wider">Detail Produk</th>
                        <th class="px-6 py-4 border-b-2 border-coklat-muda bg-coklat-krem text-left text-xs font-bold text-coklat-tua uppercase tracking-wider">Pengrajin</th>
                        <th class="px-6 py-4 border-b-2 border-coklat-muda bg-coklat-krem text-left text-xs font-bold text-coklat-tua uppercase tracking-wider">Harga & Stok</th>
                        <th class="px-6 py-4 border-b-2 border-coklat-muda bg-coklat-krem text-center text-xs font-bold text-coklat-tua uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $produk)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-5 border-b border-gray-200">
                            @if($produk->foto)
                                <img src="{{ asset('storage/' . $produk->foto) }}" class="w-20 h-20 object-cover rounded-lg shadow-sm border border-gray-200">
                            @else
                                <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xs font-semibold border border-gray-200">
                                    No Image
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-5 border-b border-gray-200">
                            <p class="font-bold text-coklat-gelap text-base">{{ $produk->nama_produk }}</p>
                            <p class="text-xs text-gray-500 mt-1 truncate w-48">{{ $produk->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                        </td>
                        <td class="px-6 py-5 border-b border-gray-200">
                            <span class="bg-coklat-krem text-coklat-sedang py-1 px-3 rounded-full text-xs font-bold flex items-center w-fit gap-1">
                                👤 {{ $produk->pengrajin->nama_pengrajin }}
                            </span>
                        </td>
                        <td class="px-6 py-5 border-b border-gray-200">
                            <p class="font-extrabold text-coklat-tua text-base">Rp {{ number_format($produk->harga) }}</p>
                            <p class="text-xs {{ $produk->stok > 0 ? 'text-green-600' : 'text-red-600' }} font-semibold mt-1">
                                Stok: {{ $produk->stok }}
                            </span>
                        </td>
                        <td class="px-6 py-5 border-b border-gray-200 text-center">
                            <a href="{{ route('produks.show', $produk->id) }}" class="inline-flex items-center bg-green-50 text-green-700 px-4 py-2 rounded-full text-xs font-bold hover:bg-green-100 transition group">
                                Kelola Detail <span class="group-hover:translate-x-1 transition">→</span>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500 font-semibold bg-gray-50">
                            Belum ada data produk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection