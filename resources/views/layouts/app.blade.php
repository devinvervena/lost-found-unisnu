<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found UNISNU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen font-sans">
    <!-- Navbar Warna Hijau UNISNU -->
    <nav class="bg-[#00743f] text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <!-- Logo dan Teks -->
            <a href="{{ route('items.index') }}" class="flex items-center gap-3 hover:opacity-90 transition">
                <img src="{{ asset('images/logo-unisnu.png') }}" alt="Logo UNISNU" class="h-10 w-10 bg-white rounded-full p-1">
                <span class="font-bold text-xl tracking-wide hidden md:block">Lost & Found UNISNU</span>
            </a>
            
            <div class="space-x-4 items-center flex">
                <a href="{{ route('items.create') }}" class="bg-yellow-400 text-green-900 px-4 py-2 rounded-lg font-bold hover:bg-yellow-300 transition shadow">+ Lapor Barang</a>
                
                @auth
                    <span class="text-sm hidden md:block">Halo, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:bg-red-700 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-white text-green-800 px-4 py-2 rounded-lg font-bold hover:bg-gray-100 transition">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="max-w-6xl mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-gray-500 text-sm py-8 mt-10">
        &copy; {{ date('Y') }} Kelompok Capstone UNISNU (Devin, Arya, Ilham).
    </footer>
</body>
</html>