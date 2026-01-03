<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login - SIMPROKAB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-coklat-muda flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 border-t-4 border-coklat-tua relative">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-coklat-tua">LOGIN</h1>
            <p class="text-sm text-gray-500">Silakan masuk untuk melanjutkan</p>
        </div>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-coklat-gelap mb-1 font-semibold">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded focus:ring ring-coklat-sedang focus:border-coklat-tua outline-none transition" required autofocus>
            </div>
            <div class="mb-6">
                <label class="block text-coklat-gelap mb-1 font-semibold">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 p-2 rounded focus:ring ring-coklat-sedang focus:border-coklat-tua outline-none transition" required>
            </div>
            
            <button class="w-full bg-coklat-tua text-white py-2 rounded hover:bg-coklat-gelap transition font-bold shadow-md">
                MASUK (LOGIN)
            </button>
        </form>

        <div class="mt-6 text-center border-t pt-4">
            <p class="text-sm text-gray-500 mb-3">Belum punya akun?</p>
            
            <div class="flex flex-col gap-3">
                <a href="{{ route('register') }}" class="w-full block border border-coklat-sedang text-coklat-tua py-2 rounded font-bold hover:bg-coklat-krem transition text-sm">
                    Daftar Pengguna Baru
                </a>
                
                <a href="/" class="w-full block bg-gray-100 text-gray-600 py-2 rounded font-bold hover:bg-gray-200 transition text-sm">
                    Masuk Sebagai Tamu (Guest)
                </a>
            </div>
        </div>

        <div class="mt-4 text-center">
            <a href="/" class="text-xs text-gray-400 hover:text-coklat-tua transition flex items-center justify-center gap-1">
                &larr; Kembali ke Halaman Depan
            </a>
        </div>

    </div>
</body>
</html>