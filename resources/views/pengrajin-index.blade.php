@extends('layouts.public')

@section('content')
<div class="bg-coklat-muda py-10 text-center mb-8">
    <h1 class="text-3xl font-bold text-coklat-gelap">Direktori Pengrajin Lokal</h1>
    <p class="text-coklat-tua mt-2">Kenali seniman-seniman hebat di balik karya indah Bantul</p>
</div>

<div class="max-w-7xl mx-auto px-4 pb-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($pengrajins as $p)
        <a href="{{ route('public.pengrajin.show', $p->id) }}" class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition border border-gray-100 flex items-center gap-4 group">
            <div class="w-16 h-16 bg-coklat-tua text-white rounded-full flex items-center justify-center text-2xl font-bold group-hover:bg-coklat-sedang transition">
                {{ substr($p->nama_pengrajin, 0, 1) }}
            </div>
            
            <div>
                <h3 class="text-lg font-bold text-gray-800 group-hover:text-coklat-tua">{{ $p->nama_pengrajin }}</h3>
                <p class="text-sm text-coklat-sedang font-semibold uppercase tracking-wide">{{ $p->jenis_kerajinan }}</p>
                <p class="text-xs text-gray-500 mt-1 truncate w-48">📍 {{ $p->alamat }}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection