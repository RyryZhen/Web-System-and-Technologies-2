<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Books Dashboard')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F2F4E8] font-sans text-[#282C22] antialiased">

    <div class="flex min-h-screen">
        <aside class="w-72 bg-white/40 backdrop-blur-xl border-r border-[#D1D5C2] hidden lg:flex flex-col p-8 sticky top-0 h-screen">
            <div class="flex items-center gap-3 mb-12">
                <div class="w-10 h-10 bg-[#586445] rounded-2xl flex items-center justify-center text-white shadow-lg shadow-[#586445]/20">
                    <span class="text-xl italic">M</span>
                </div>
                <h1 class="font-serif font-bold text-2xl text-[#586445] tracking-tight">Fernandez, Ryan</h1>
            </div>

            <nav class="flex-1 space-y-2">
                @include('layouts.partials.nav-links')
            </nav>

            <div class="mt-auto pt-6 border-t border-[#D1D5C2]">
                <div class="flex items-center gap-4 px-2">
                    <div class="w-12 h-12 rounded-full bg-[#A7AD8C] border-2 border-white overflow-hidden">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Rudolf" alt="User">
                    </div>
                    <div>
                        <p class="font-bold text-sm">Ryan Fernandez</p>
                        <p class="text-xs text-[#586445]/60 uppercase font-semibold">Admin</p>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="h-20 flex items-center justify-between px-6 lg:px-12">
                <div class="lg:hidden">
                    <button class="p-2 text-[#586445]">☰</button>
                </div>

                <div class="flex-1 flex justify-end items-center gap-6">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-bold text-[#586445] uppercase tracking-widest">Local Time</p>
                        <p class="text-sm font-medium">{{ now()->format('h:i A') }} PHT</p>
                    </div>
                </div>
            </header>

            <main class="px-6 lg:px-12 pb-12">
                @if (isset($header))
                    <div class="mb-10">
                        {{ $header }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>