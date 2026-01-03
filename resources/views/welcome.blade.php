@extends('layouts.public')

@section('content')
    <div class="bg-coklat-krem relative overflow-hidden">
        
        <div class="absolute top-0 left-0 w-64 h-64 bg-coklat-gold opacity-5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-coklat-sedang opacity-5 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 py-20 md:py-28 text-center">
            
            <span class="inline-block py-1 px-3 rounded-full bg-white border border-coklat-gold/30 text-coklat-sedang text-xs font-bold tracking-widest uppercase mb-6 shadow-sm">
                ✨ Warisan Budaya Yogyakarta
            </span>

<h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-coklat-gelap mb-6 leading-tight font-serif">
    Mahakarya Pengrajin <br>
    <span class="text-transparent bg-clip-text bg-gradient-to-r from-coklat-tua to-coklat-sedang">
        Kabupaten Bantul
    </span>
</h1>

            <p class="text-lg md:text-xl text-gray-600 mb-10 leading-relaxed font-light max-w-2xl mx-auto">
                Sistem Informasi Manajemen Produk Kerajinan Lokal Bantul ini bertujuan untuk memperkenalkan 
                kerajinan otentik dan profil pengrajin berbakat yang berasal dari Kabupaten Bantul, Yogyakarta, 
                kepada dunia luas.
            </p>
            
            <form action="/" method="GET" class="max-w-xl mx-auto relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-coklat-sedang" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                
                <input type="text" name="cari" value="{{ request('cari') }}" 
                    placeholder="Cari 'Gerabah', 'Batik', atau nama pengrajin..." 
                    class="w-full pl-12 pr-32 py-4 rounded-full border-2 border-transparent bg-white shadow-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-coklat-gold transition-all duration-300 font-sans">
                
                <button type="submit" class="absolute right-2 top-2 bottom-2 bg-coklat-tua text-white px-6 rounded-full font-bold hover:bg-coklat-gelap transition duration-300 shadow-md">
                    Telusuri
                </button>
            </form>

            <div class="mt-12 flex justify-center gap-2">
                <div class="h-1 w-2 bg-coklat-gold rounded-full opacity-50"></div>
                <div class="h-1 w-16 bg-coklat-gold rounded-full"></div>
                <div class="h-1 w-2 bg-coklat-gold rounded-full opacity-50"></div>
            </div>
        </div>
    </div>

    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b border-coklat-muda pb-4">
                <div>
                    <h2 class="text-3xl font-bold text-coklat-tua font-serif">
                        @if(request('cari'))
                            Hasil Pencarian: "{{ request('cari') }}"
                        @else
                            Koleksi Terkini
                        @endif
                    </h2>
                    <p class="text-gray-500 mt-2 font-sans">Menampilkan produk pilihan langsung dari tangan pengrajin.</p>
                </div>
                
                @if(request('cari'))
                    <a href="/" class="text-sm text-red-600 hover:text-red-800 font-bold mt-4 md:mt-0 flex items-center gap-1">
                        <span>✕</span> Hapus Filter
                    </a>
                @endif
            </div>

            @if($produks->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @foreach($produks as $produk)
                        <a href="{{ route('public.show', $produk->id) }}" class="group block bg-white rounded-t-xl hover:shadow-2xl transition duration-500 flex flex-col h-full border-b-4 border-transparent hover:border-coklat-gold">
                            
                            <div class="overflow-hidden rounded-t-xl relative aspect-w-4 aspect-h-3">
                                @if($produk->foto)
                                    <img src="{{ asset('storage/' . $produk->foto) }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
                                @else
                                    <div class="w-full h-64 bg-gray-100 flex items-center justify-center text-gray-400 font-serif italic">No Preview</div>
                                @endif
                                
                                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 text-xs font-bold uppercase tracking-wider text-coklat-tua shadow-sm rounded-sm border-l-2 border-coklat-gold">
                                    {{ $produk->pengrajin->jenis_kerajinan }}
                                </div>
                            </div>

                            <div class="p-6 flex-1 flex flex-col justify-between bg-white relative top-0 group-hover:-top-2 transition-all duration-300">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-coklat-tua font-serif mb-2 leading-tight">
                                        {{ $produk->nama_produk }}
                                    </h3>
                                    <p class="text-sm text-gray-500 flex items-center gap-1 font-sans">
                                        <span class="w-4 h-[1px] bg-coklat-sedang inline-block"></span>
                                        {{ $produk->pengrajin->nama_pengrajin }}
                                    </p>
                                </div>
                                
                                <div class="mt-6 flex justify-between items-end border-t border-gray-100 pt-4">
                                    <div>
                                        <p class="text-xs text-gray-400 mb-1">Harga</p>
                                        <span class="text-lg font-bold text-coklat-gelap font-sans">
                                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <span class="w-10 h-10 rounded-full bg-coklat-krem flex items-center justify-center text-coklat-tua group-hover:bg-coklat-tua group-hover:text-white transition shadow-sm">
                                        &rarr;
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $produks->withQueryString()->links() }}
                </div>

            @else
                <div class="text-center py-20 bg-coklat-krem/30 rounded-xl border border-dashed border-coklat-muda">
                    <p class="text-coklat-sedang text-6xl mb-4">🏺</p>
                    <h3 class="text-xl font-bold text-coklat-tua font-serif">Produk Tidak Ditemukan</h3>
                    <p class="text-gray-500 mt-2 max-w-md mx-auto">Maaf, kami tidak dapat menemukan apa yang Anda cari. Coba kata kunci lain.</p>
                    <a href="/" class="mt-6 inline-block px-6 py-2 bg-coklat-tua text-white rounded-full font-bold hover:bg-coklat-gelap transition shadow">
                        Lihat Semua Katalog
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection