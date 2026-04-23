<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Studio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Soft Serif for that 'Clean Boy' editorial look */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Instrument+Serif:ital@0;1&display=swap');
        
        body { font-family: 'Inter', sans-serif; }
        .serif { font-family: 'Instrument Serif', serif; }
    </style>
</head>
<body class="bg-[#fcfaf7] text-slate-800 antialiased">

    <div class="w-full bg-[#f4f1ee] px-8 py-2 text-[10px] flex justify-between items-center text-slate-400 font-medium tracking-widest uppercase">
        <div class="flex gap-6">
            <span>User // {{ auth()->user()->name ?? 'Guest' }}</span>
            <span>Local // {{ now()->format('H:i') }}</span>
        </div>
        <div class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
            <span>System Stable</span>
        </div>
    </div>

 

<header class="max-w-6xl mx-auto px-8 pt-16 pb-12 flex justify-between items-end">
    <div>
        <h1 class="serif text-5xl italic text-slate-900 lowercase tracking-tight">studio.</h1>
        <p class="text-[10px] text-slate-400 uppercase tracking-[0.2em] mt-2">Visual Archive & Documentation</p>
    </div>

    <nav class="flex gap-8 text-[10px] uppercase tracking-[0.2em] font-semibold text-slate-400">
        <a href="{{ route('photos.index') }}" class="hover:text-slate-900 transition-colors border-b border-slate-900 text-slate-900 pb-1">Archive</a>
        <a href="#" class="hover:text-slate-900 transition-colors border-b border-transparent hover:border-slate-900 pb-1">Collection</a>
        <a href="#" class="hover:text-slate-900 transition-colors border-b border-transparent hover:border-slate-900 pb-1">About</a>
    </nav>
</header>

    <main class="max-w-6xl mx-auto px-8 py-4">
        <div class="bg-white rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100 min-h-[60vh] p-8">
            @yield('content')
        </div>
    </main>

    <footer class="mt-20 py-12 border-t border-slate-100 text-center">
        <p class="serif text-2xl text-slate-300 italic mb-4">Ryan Fernandez</p>
        <div class="text-[10px] text-slate-400 uppercase tracking-[0.3em]">
            &copy; 2026 Websys2 — All Rights Reserved
        </div>
    </footer>

</body>
</html>