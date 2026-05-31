<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - StarBarak</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|instrument-serif:400i" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#F8FAF5]">
        <div class="min-h-screen flex">
            
            {{-- ONLY SHOW SIDEBAR IF AUTHENTICATED --}}
            @auth
            <!-- Simplified Starbucks Sidebar -->
            <aside class="w-64 bg-[#1E3932] text-white hidden md:flex flex-col flex-shrink-0 shadow-2xl">
                <!-- Logo -->
                <div class="p-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#00704A] rounded-xl flex items-center justify-center border border-white/10 shadow-lg">
                            <span class="text-xl font-serif italic text-white">S</span>
                        </div>
                        <h1 class="text-lg font-black tracking-tight leading-none">StarBarak</h1>
                    </div>
                </div>

                <!-- Simplified Menu -->
                <nav class="mt-4 flex-1 px-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : 'text-emerald-100/50 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                        <span class="font-bold text-sm">Dashboard</span>
                    </a>
                </nav>

                <!-- Dedicated Sign Out Bottom -->
                <div class="p-4 border-t border-white/5">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 px-4 py-3 w-full text-red-300/70 hover:text-red-400 hover:bg-red-500/10 rounded-xl transition-all font-bold text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            Sign Out
                        </button>
                    </form>
                </div>
            </aside>
            @endauth

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col">
                
                {{-- ONLY SHOW HEADER IF AUTHENTICATED --}}
                @auth
                <header class="bg-white/60 backdrop-blur-xl border-b border-emerald-100/50 sticky top-0 z-40">
                    <div class="max-w-7xl mx-auto h-20 px-8 flex justify-between items-center">
                        <h3 class="font-bold text-xl text-[#1E3932]">{{ $header ?? 'Dashboard' }}</h3>
                        
                        <div class="flex items-center gap-4 px-4 py-2 bg-emerald-50 rounded-full border border-emerald-100">
                            <div class="w-8 h-8 rounded-full bg-[#00704A] flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="text-sm font-bold text-[#1E3932]">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </header>
                @endauth

                <!-- Page Content -->
                <main class="p-8 lg:p-12">
                    <div class="max-w-7xl mx-auto">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>