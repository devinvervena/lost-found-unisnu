<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login - SITEMU UNISNU</title>
        
        <!-- Pakai Tailwind CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/" class="flex items-center justify-center gap-3">
                    <img src="{{ asset('images/logo-unisnu.png') }}" alt="Logo UNISNU" class="h-14 w-14 bg-white rounded-full p-1 shadow-md">
                    <span class="text-2xl font-bold text-[#00743f]">SITEMU UNISNU</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>