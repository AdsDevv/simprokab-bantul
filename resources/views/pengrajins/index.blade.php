@extends('layouts.admin')

@section('title', 'Data Pengrajin')

@section('content')
    <div class="mb-4 flex flex-col md:flex-row justify-between md:items-center gap-4">
        <h2 class="text-2xl font-bold text-coklat-tua font-serif">Daftar Pengrajin</h2>
        <a href="{{ route('pengrajins.create') }}" class="bg-coklat-tua text-white px-6 py-2 rounded-full hover:bg-coklat-gelap transition font-bold text-sm text-center shadow-md">
            + Tambah Pengrajin
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm font-semibold">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
        
        <div class="overflow-x-auto">
            <table class="min-w-[700px] leading-normal w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-4 border-b-2 border-coklat-muda bg-coklat-krem text-left text-xs font-bold text-coklat-tua uppercase tracking-wider">Nama Pengrajin</th>
                        <th class="px-6 py-4 border-b-2 border-coklat-muda bg-coklat-krem text-left text-xs font-bold text-coklat-tua uppercase tracking-wider">Spesialisasi</th>
                        <th class="px-6 py-4 border-b-2 border-coklat-muda bg-coklat-krem text-left text-xs font-bold text-coklat-tua uppercase tracking-wider">Kontak & Alamat</th>
                        <th class="px-6 py-4 border-b-2 border-coklat-muda bg-coklat-krem text-center text-xs font-bold text-coklat-tua uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengrajins as $p)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-5 border-b border-gray-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-coklat-sedang text-white flex items-center justify-center font-bold mr-3">
                                    {{ substr($p->nama_pengrajin, 0, 1) }}
                                </div>
                                <p class="text-gray-900 font-bold text-base">{{ $p->nama_pengrajin }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-5 border-b border-gray-200">
                            <span class="bg-coklat-krem text-coklat-tua py-1 px-3 rounded-full text-xs font-bold border border-coklat-gold">
                                {{ $p->jenis_kerajinan }}
                            </span>
                        </td>
                        <td class="px-6 py-5 border-b border-gray-200 text-sm">
                            <p class="text-gray-900 font-semibold">📞 {{ $p->kontak }}</p>
                            <p class="text-gray-500 text-xs mt-1 truncate w-48">📍 {{ $p->alamat }}</p>
                        </td>
                        <td class="px-6 py-5 border-b border-gray-200 text-center">
                            <a href="{{ route('pengrajins.show', $p->id) }}" class="inline-flex items-center bg-green-50 text-green-700 px-4 py-2 rounded-full text-xs font-bold hover:bg-green-100 transition group">
                                Kelola Detail <span class="group-hover:translate-x-1 transition">→</span>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500 font-semibold bg-gray-50">
                            Belum ada data pengrajin.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection