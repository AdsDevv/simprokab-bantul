<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPROKAB - Mahakarya Kerajinan Bantul</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-coklat-krem font-sans antialiased text-coklat-gelap flex flex-col min-h-screen overflow-x-hidden w-full">

    <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-coklat-muda/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                
                <div class="flex items-center gap-10">
                    <a href="/" class="group flex items-center gap-2">
                        <span class="text-3xl">🏺</span>
                        <div class="flex flex-col">
                            <span class="font-serif font-bold text-2xl text-coklat-tua tracking-tight group-hover:text-coklat-sedang transition">
                                SIMPROKAB
                            </span>
                            <span class="text-[10px] uppercase tracking-[0.2em] text-coklat-gold font-bold hidden sm:block">
                                Heritage of Bantul
                            </span>
                        </div>
                    </a>

                    <div class="hidden md:flex gap-8 items-center">
                        <a href="/" class="text-sm font-bold uppercase tracking-wide {{ request()->is('/') ? 'text-coklat-tua border-b-2 border-coklat-gold' : 'text-gray-500 hover:text-coklat-tua transition' }}">
                            Beranda
                        </a>
                        <a href="{{ route('public.pengrajin') }}" class="text-sm font-bold uppercase tracking-wide {{ request()->routeIs('public.pengrajin*') ? 'text-coklat-tua border-b-2 border-coklat-gold' : 'text-gray-500 hover:text-coklat-tua transition' }}">
                            Profil Pengrajin
                        </a>
                        <a href="{{ route('public.about') }}" class="text-sm font-bold uppercase tracking-wide {{ request()->routeIs('public.about') ? 'text-coklat-tua border-b-2 border-coklat-gold' : 'text-gray-500 hover:text-coklat-tua transition' }}">
                            Tentang Kami
                        </a>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="hidden md:block">
                        @if (Route::has('login'))
                            @auth
                                <div class="flex items-center gap-4">
                                    <span class="text-sm font-bold text-coklat-tua hidden lg:block">
                                        Halo, {{ Auth::user()->name }}
                                    </span>

                                    @if(Auth::user()->role === 'admin')
                                        <a href="{{ route('dashboard') }}" class="text-sm font-bold text-coklat-tua hover:text-coklat-gold transition border border-coklat-tua rounded-full px-4 py-1">
                                            Dashboard &rarr;
                                        </a>
                                    @endif

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="text-sm font-bold text-red-600 hover:text-red-800 transition">
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="px-6 py-2 text-sm font-bold text-coklat-tua border-2 border-coklat-tua rounded-full hover:bg-coklat-tua hover:text-white transition">
                                    Masuk / Daftar
                                </a>
                            @endauth
                        @endif
                    </div>

                    <button id="mobile-menu-btn" class="md:hidden text-coklat-tua focus:outline-none p-2">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg">
            <div class="px-4 pt-2 pb-6 space-y-2">
                <a href="/" class="block px-3 py-3 rounded-md text-base font-bold {{ request()->is('/') ? 'bg-coklat-muda text-coklat-tua' : 'text-gray-600 hover:bg-gray-50' }}">
                    🏠 Beranda
                </a>
                <a href="{{ route('public.pengrajin') }}" class="block px-3 py-3 rounded-md text-base font-bold {{ request()->routeIs('public.pengrajin*') ? 'bg-coklat-muda text-coklat-tua' : 'text-gray-600 hover:bg-gray-50' }}">
                    👥 Profil Pengrajin
                </a>
                <a href="{{ route('public.about') }}" class="block px-3 py-3 rounded-md text-base font-bold {{ request()->routeIs('public.about') ? 'bg-coklat-muda text-coklat-tua' : 'text-gray-600 hover:bg-gray-50' }}">
                    ℹ️ Tentang Kami
                </a>
                
                <div class="border-t pt-4 mt-2">
                    @auth
                        <div class="px-3 mb-3 text-sm font-bold text-coklat-tua">
                            Halo, {{ Auth::user()->name }}
                        </div>

                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('dashboard') }}" class="block w-full text-center px-4 py-3 bg-coklat-tua text-white rounded-lg font-bold mb-2">
                                Ke Dashboard Admin
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-center px-4 py-3 border border-red-200 text-red-600 rounded-lg font-bold hover:bg-red-50">
                                Keluar (Logout)
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block w-full text-center px-4 py-3 border-2 border-coklat-tua text-coklat-tua rounded-lg font-bold hover:bg-coklat-tua hover:text-white transition">
                            Masuk / Daftar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-coklat-gelap text-white pt-16 pb-8 border-t-8 border-coklat-sedang">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12 text-center md:text-left">
                
                <div>
                    <h3 class="font-serif text-2xl font-bold mb-6 text-coklat-gold">SIMPROKAB</h3>
                    <p class="text-coklat-muda/80 leading-relaxed text-sm">
                        Sistem Informasi Manajemen Produk Kerajinan Bantul. Wadah digital untuk melestarikan dan memperkenalkan karya tangan pengrajin lokal ke panggung dunia.
                    </p>
                </div>

                <div>
                    <h4 class="font-sans font-bold text-lg mb-6 uppercase tracking-wider">Jelajahi</h4>
                    <ul class="space-y-3 text-coklat-muda/80 text-sm">
                        <li><a href="/" class="hover:text-white hover:underline decoration-coklat-gold underline-offset-4 transition">Katalog Produk</a></li>
                        <li><a href="{{ route('public.pengrajin') }}" class="hover:text-white hover:underline decoration-coklat-gold underline-offset-4 transition">Direktori Pengrajin</a></li>
                        <li><a href="{{ route('public.about') }}" class="hover:text-white hover:underline decoration-coklat-gold underline-offset-4 transition">Tentang Kami</a></li>
                        @guest
                            <li><a href="{{ route('login') }}" class="hover:text-white hover:underline decoration-coklat-gold underline-offset-4 transition">Masuk / Daftar</a></li>
                        @endguest
                    </ul>
                </div>

                <div>
                    <h4 class="font-sans font-bold text-lg mb-6 uppercase tracking-wider">Hubungi Kami</h4>
                    <ul class="space-y-4 text-coklat-muda/80 text-sm">
                        <li class="flex items-start gap-3 justify-center md:justify-start">
                            <span class="text-coklat-gold mt-1">📍</span>
                            <span>Jl. Parangtritis Km 10, Bantul,<br>Yogyakarta, Indonesia</span>
                        </li>
                        <li class="flex items-center gap-3 justify-center md:justify-start">
                            <span class="text-coklat-gold">✉️</span>
                            <span>adsproject@simprokab.id</span>
                        </li>
                        <li class="flex items-center gap-3 justify-center md:justify-start">
                            <span class="text-coklat-gold">📞</span>
                            <span>(0831) 2039-01711</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-white/40">
                <p>&copy; 2025 SIMPROKAB || AdsDev.</p>
                <p class="mt-2 md:mt-0 font-serif italic">"Cintai Produk Dalam Negeri"</p>
            </div>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>
</html>