<!DOCTYPE html>
<html lang="en" class="h-full bg-[#f8fafc]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPortal | Student Management System</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen antialiased text-slate-900">

    <nav class="glass-nav border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-16">
                
                <div class="flex items-center space-x-4">
                    <div class="bg-indigo-600 p-2 rounded-lg shadow-indigo-200 shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <a href="{{ route('dashboard') }}" class="group">
                        <span class="text-slate-900 font-extrabold text-lg tracking-tight group-hover:text-indigo-600 transition">EduPortal</span>
                        <span class="hidden sm:inline-block ml-2 px-2 py-0.5 rounded text-[10px] font-bold bg-slate-100 text-slate-500 uppercase tracking-wider">v2.0</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center bg-slate-100/50 p-1 rounded-xl border border-slate-200">
                    @if(Session::has('user_id'))
                        <a href="{{ route('dashboard') }}" class="px-4 py-1.5 rounded-lg text-sm font-semibold transition {{ Request::is('dashboard') ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('user.settings') }}" class="px-4 py-1.5 rounded-lg text-sm font-semibold transition {{ Request::is('settings*') ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">
                            Account Settings
                        </a>
                    @endif
                </div>

                <div class="flex items-center space-x-3">
                    @if(Session::has('user_id'))
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center text-slate-500 hover:text-red-600 font-semibold text-sm transition">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Sign Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-600 hover:text-indigo-600 text-sm font-bold transition px-4">Sign In</a>
                        <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl text-sm font-bold shadow-md shadow-indigo-100 transition-all hover:scale-[1.02] active:scale-[0.98]">
                            Get Started
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl mx-auto w-full px-6 py-8">
        
        @if(session('success'))
            <div class="max-w-4xl mx-auto mb-8 bg-white border-l-4 border-emerald-500 p-4 rounded-r-2xl shadow-sm flex items-center justify-between">
                <div class="flex items-center">
                    <div class="bg-emerald-100 p-2 rounded-full mr-3">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <p class="text-sm font-semibold text-slate-700">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-slate-400 hover:text-slate-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2"></path></svg>
                </button>
            </div>
        @endif

        <div class="animate-in fade-in duration-700">
            @yield('content')
        </div>
    </main>

    <footer class="bg-white border-t border-slate-200 py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex flex-col items-center md:items-start">
                    <div class="flex items-center space-x-2 mb-3">
                        <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                        <span class="text-slate-900 font-bold tracking-tight">University Management System</span>
                    </div>
                    <p class="text-slate-500 text-xs font-medium max-w-xs text-center md:text-left leading-relaxed">
                        Providing a seamless digital experience for students and faculty since 2026.
                    </p>
                </div>
                
                <div class="flex flex-col items-center md:items-end space-y-4">
                    <div class="flex items-center space-x-6 text-sm font-semibold text-slate-400">
                        <a href="#" class="hover:text-indigo-600 transition">Support</a>
                        <a href="#" class="hover:text-indigo-600 transition">Privacy</a>
                        <a href="#" class="hover:text-indigo-600 transition">Terms</a>
                    </div>
                    <div class="text-slate-400 text-[11px] font-bold uppercase tracking-[0.1em]">
                        &copy; 2026 • Office of the Registrar
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>