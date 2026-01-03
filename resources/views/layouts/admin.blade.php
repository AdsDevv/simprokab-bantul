<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin SIMPROKAB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-900">

    <div class="flex h-screen overflow-hidden">
        
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-coklat-tua text-white transition-transform duration-300 transform -translate-x-full md:translate-x-0 shadow-xl flex flex-col justify-between">
            
            <div>
                <div class="h-16 flex items-center justify-center border-b border-coklat-sedang/30 bg-coklat-gelap">
                    <span class="text-2xl">🏺</span>
                    <span class="ml-2 text-xl font-bold font-serif tracking-wide text-coklat-gold">SIMPROKAB</span>
                </div>

                <nav class="mt-6 px-4 space-y-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-lg transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-coklat-gold text-coklat-gelap font-bold shadow' : 'text-coklat-muda hover:bg-coklat-sedang hover:text-white' }}">
                        <span class="w-6 text-center">🏠</span>
                        <span class="ml-3">Dashboard</span>
                    </a>

                    <a href="{{ route('pengrajins.index') }}" class="flex items-center px-4 py-3 rounded-lg transition duration-200 {{ request()->routeIs('pengrajins*') ? 'bg-coklat-gold text-coklat-gelap font-bold shadow' : 'text-coklat-muda hover:bg-coklat-sedang hover:text-white' }}">
                        <span class="w-6 text-center">👥</span>
                        <span class="ml-3">Data Pengrajin</span>
                    </a>

                    <a href="{{ route('produks.index') }}" class="flex items-center px-4 py-3 rounded-lg transition duration-200 {{ request()->routeIs('produks*') ? 'bg-coklat-gold text-coklat-gelap font-bold shadow' : 'text-coklat-muda hover:bg-coklat-sedang hover:text-white' }}">
                        <span class="w-6 text-center">🏺</span>
                        <span class="ml-3">Data Produk</span>
                    </a>
                </nav>
            </div>

            <div class="p-4 border-t border-coklat-sedang/30 bg-coklat-gelap/50">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-2 text-red-200 hover:text-white hover:bg-red-900/50 rounded transition duration-200">
                        <span>🚪</span>
                        <span class="ml-3 font-semibold">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col md:ml-64 transition-all duration-300 min-h-screen">
            
            <header class="bg-white shadow-sm h-16 flex justify-between items-center px-6 border-b border-gray-200 sticky top-0 z-40">
                
                <button id="sidebarToggle" class="md:hidden text-coklat-tua focus:outline-none p-2 rounded hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>

                <h1 class="text-xl font-bold text-coklat-tua font-serif hidden md:block">@yield('title')</h1>

                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-coklat-sedang text-white flex items-center justify-center font-bold text-lg shadow">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                @yield('content')
            </main>

            <footer class="bg-white p-4 text-center text-xs text-gray-500 border-t">
                &copy; 2025 SIMPROKAB - Kerajinan Bantul
            </footer>

        </div>
    </div>

    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden glass"></div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarToggle');
        const overlay = document.getElementById('sidebarOverlay');

        // Fungsi Buka/Tutup Sidebar Mobile
        function toggleSidebar() {
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);
    </script>

</body>
</html>