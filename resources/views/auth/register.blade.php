<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Akun - SIMPROKAB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-coklat-muda flex items-center justify-center min-h-screen py-10">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 border-t-4 border-coklat-tua relative">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-coklat-tua">DAFTAR AKUN</h1>
            <p class="text-sm text-gray-500">Isi data diri untuk bergabung</p>
        </div>
        
        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-coklat-gelap mb-1 font-semibold">Nama Lengkap</label>
                <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded focus:ring ring-coklat-sedang focus:border-coklat-tua outline-none transition" required autofocus>
            </div>

            <div class="mb-4">
                <label class="block text-coklat-gelap mb-1 font-semibold">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded focus:ring ring-coklat-sedang focus:border-coklat-tua outline-none transition" required>
            </div>

            <div class="mb-4">
                <label class="block text-coklat-gelap mb-1 font-semibold">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 p-2 rounded focus:ring ring-coklat-sedang focus:border-coklat-tua outline-none transition" required>
            </div>

            <div class="mb-6">
                <label class="block text-coklat-gelap mb-1 font-semibold">Ulangi Password</label>
                <input type="password" name="password_confirmation" class="w-full border border-gray-300 p-2 rounded focus:ring ring-coklat-sedang focus:border-coklat-tua outline-none transition" required>
            </div>
            
            <button class="w-full bg-coklat-tua text-white py-2 rounded hover:bg-coklat-gelap transition font-bold shadow-md">
                DAFTAR SEKARANG
            </button>
        </form>

        <div class="mt-6 text-center border-t pt-4">
            <p class="text-sm text-gray-500 mb-2">Sudah punya akun?</p>
            <a href="{{ route('login') }}" class="text-coklat-tua font-bold hover:underline transition">
                Masuk (Login) Disini
            </a>
        </div>
    </div>
</body>
</html>