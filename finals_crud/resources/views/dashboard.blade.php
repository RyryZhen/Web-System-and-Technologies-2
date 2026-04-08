@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-8 animate-in fade-in duration-700">
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <div class="lg:col-span-3 bg-gradient-to-br from-indigo-600 to-violet-700 rounded-[3rem] p-10 text-white shadow-2xl shadow-indigo-200 relative overflow-hidden group">
            <div class="absolute right-0 top-0 w-64 h-64 bg-white/10 rounded-full -mr-20 -mt-20 blur-3xl group-hover:scale-110 transition duration-700"></div>
            
            <div class="relative z-10">
                <span class="px-4 py-1.5 bg-white/20 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-[0.2em]">Academic Session 2026</span>
                <h1 class="text-5xl font-extrabold tracking-tight mt-6 mb-2">
                    Hello, {{ explode(' ', $user->name)[0] }}!
                </h1>
                <p class="text-indigo-100 font-medium text-lg max-w-md opacity-90">
                    Your semester is in full swing. Everything looks good on our end.
                </p>
            </div>
        </div>

        <div class="bg-white rounded-[3rem] p-8 border border-slate-100 shadow-sm flex flex-col items-center justify-center text-center">
            <div class="w-20 h-20 bg-slate-50 rounded-[2rem] flex items-center justify-center mb-4 border border-slate-100 shadow-inner">
                <span class="text-3xl font-black text-indigo-600">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
            </div>
            <h3 class="font-bold text-slate-900 leading-tight">{{ $user->name }}</h3>
            <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-tighter">ID: {{ $user->student_id }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Academic Program</p>
            <h4 class="text-xl font-bold text-slate-900">{{ $user->course }}</h4>
            <p class="text-sm font-semibold text-indigo-600 mt-1">{{ $user->year_level }}</p>
        </div>

        <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Institutional Mail</p>
            <p class="text-lg font-bold text-slate-900 truncate">{{ $user->email }}</p>
            <p class="text-[10px] font-bold text-emerald-600 mt-2 bg-emerald-50 inline-block px-2 py-0.5 rounded-full">ACTIVE</p>
        </div>

        <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white flex flex-col justify-between">
            <div>
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Permanent Residence</p>
                <p class="text-sm font-medium leading-relaxed opacity-90">{{ $user->address }}</p>
            </div>
            <div class="mt-8 flex items-center text-xs font-bold text-indigo-400">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-width="2"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2"></path></svg>
                Registered Location
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-indigo-50/50 rounded-[2.5rem] p-8 border border-indigo-100 flex items-center justify-between">
            <div class="flex items-center space-x-6">
                <div class="bg-white p-4 rounded-3xl shadow-sm text-2xl">🎂</div>
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Birth Date</p>
                    <p class="text-xl font-bold text-slate-900">{{ \Carbon\Carbon::parse($user->birthdate)->format('M d, Y') }}</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Contact</p>
                <p class="text-lg font-bold text-slate-900">{{ $user->contact_no }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('user.settings') }}" class="bg-white hover:bg-slate-50 border border-slate-100 p-6 rounded-[2rem] flex flex-col items-center justify-center transition group shadow-sm">
                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition">⚙️</div>
                <span class="text-xs font-bold text-slate-700">Settings</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" class="h-full">
                @csrf
                <button type="submit" class="w-full h-full bg-red-50 hover:bg-red-100 border border-red-100 p-6 rounded-[2rem] flex flex-col items-center justify-center transition group">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition">🚪</div>
                    <span class="text-xs font-bold text-red-600">Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection