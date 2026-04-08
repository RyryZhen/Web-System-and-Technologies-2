@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-4 animate-in fade-in duration-700">
    <div class="bg-white rounded-[3rem] shadow-2xl shadow-slate-200/60 w-full max-w-5xl flex flex-col md:flex-row overflow-hidden border border-slate-100">
        
        <div class="md:w-1/2 bg-indigo-600 p-12 text-white flex flex-col justify-between relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-400/20 rounded-full -ml-32 -mb-32 blur-3xl"></div>
            
            <div class="relative z-10">
                <div class="inline-flex items-center justify-center bg-white/10 backdrop-blur-xl w-14 h-14 rounded-2xl mb-8 border border-white/20">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.132A10.01 10.01 0 0010 11V4a1 1 0 00-1-1H5a1 1 0 00-1 1v7c0 2.017.391 3.942 1.106 5.71m9.526-1.12a10.01 10.01 0 011.106-5.71V4a1 1 0 011-1h4a1 1 0 011 1v7c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.132A10.01 10.01 0 0015 11"></path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black leading-tight tracking-tight">Access Your <br/>Academic World.</h2>
                <p class="mt-4 text-indigo-100 font-medium opacity-80 leading-relaxed">
                    Welcome back to the next generation of student management. Log in to track your progress and manage records.
                </p>
            </div>

            <div class="relative z-10 pt-12">
                <div class="flex items-center space-x-2">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full border-2 border-indigo-600 bg-indigo-400"></div>
                        <div class="w-8 h-8 rounded-full border-2 border-indigo-600 bg-indigo-300"></div>
                        <div class="w-8 h-8 rounded-full border-2 border-indigo-600 bg-indigo-200"></div>
                    </div>
                    <span class="text-xs font-bold text-indigo-100 tracking-wide">Joined by 2,000+ students</span>
                </div>
            </div>
        </div>

        <div class="md:w-1/2 p-12 md:p-16 bg-white">
            <div class="mb-10">
                <h3 class="text-2xl font-bold text-slate-900 tracking-tight">Sign In</h3>
                <p class="text-slate-400 text-sm font-medium mt-1">Please enter your institutional credentials.</p>
            </div>

            @if($errors->any())
                <div class="mb-6 bg-red-50 text-red-600 p-4 rounded-2xl text-sm font-bold border border-red-100 animate-shake">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf
                
                <div class="group">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 mb-2 block">Email Address</label>
                    <input type="email" name="email" 
                        class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 focus:bg-white transition-all outline-none font-semibold text-slate-700 placeholder:text-slate-300"
                        placeholder="name@university.edu" required>
                </div>

                <div class="group">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 mb-2 block">Password</label>
                    <input type="password" name="password" 
                        class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 focus:bg-white transition-all outline-none font-semibold text-slate-700 placeholder:text-slate-300"
                        placeholder="••••••••" required>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                        class="w-full bg-slate-900 hover:bg-black text-white font-bold py-4 rounded-2xl shadow-xl shadow-slate-200 transition-all active:scale-95 flex items-center justify-center space-x-2">
                        <span>Authenticate</span>
                        <svg class="w-5 h-5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </button>
                </div>
            </form>

            <div class="mt-12 text-center">
                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-3">Don't have an account?</p>
                <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:text-indigo-700 underline decoration-2 underline-offset-8 decoration-indigo-100 hover:decoration-indigo-600 transition-all">
                    Register New Student
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-4px); }
        75% { transform: translateX(4px); }
    }
    .animate-shake { animation: shake 0.2s ease-in-out 0s 2; }
</style>
@endsection