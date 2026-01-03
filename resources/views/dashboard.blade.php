@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-coklat-tua">Selamat Datang, Admin! 👋</h2>
        <p class="text-gray-600">Berikut ringkasan data Sistem Informasi Produk Kerajinan.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-coklat-tua flex items-center justify-between">
            <div>
                <p class="text-gray-500 font-bold uppercase text-sm">Total Pengrajin</p>
                <p class="text-4xl font-extrabold text-coklat-gelap mt-2">{{ $totalPengrajin }}</p>
                <p class="text-xs text-gray-400 mt-1">Orang terdaftar</p>
            </div>
            <div class="text-5xl opacity-10">👥</div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-coklat-sedang flex items-center justify-between">
            <div>
                <p class="text-gray-500 font-bold uppercase text-sm">Total Produk</p>
                <p class="text-4xl font-extrabold text-coklat-gelap mt-2">{{ $totalProduk }}</p>
                <p class="text-xs text-gray-400 mt-1">Item tersedia</p>
            </div>
            <div class="text-5xl opacity-10">🏺</div>
        </div>
    </div>

    <div class="mt-8 bg-blue-50 p-4 rounded-lg border border-blue-100 text-blue-800 text-sm">
        💡 <strong>Info:</strong> Gunakan menu di sidebar sebelah kiri untuk mengelola data Pengrajin dan Produk.
    </div>
@endsection