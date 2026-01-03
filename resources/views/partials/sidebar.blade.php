<aside class="w-64 bg-coklat-tua text-white min-h-screen flex flex-col">
    <div class="p-6 text-2xl font-bold border-b border-coklat-sedang">
        SIMPROKAB
    </div>
    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="block p-3 rounded hover:bg-coklat-sedang transition">
            🏠 Dashboard
        </a>
        <a href="{{ route('pengrajins.index') }}" class="block p-3 rounded hover:bg-coklat-sedang transition">
            👥 Data Pengrajin
        </a>
        <a href="{{ route('produks.index') }}" class="block p-3 rounded hover:bg-coklat-sedang transition">
            🏺 Data Produk
        </a>
    </nav>
<div class="p-4 border-t border-coklat-sedang">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full text-left p-2 hover:bg-red-600 rounded flex items-center gap-2 transition duration-200">
                <span>🚪</span> Logout
            </button>
        </form>
    </div>
</aside>