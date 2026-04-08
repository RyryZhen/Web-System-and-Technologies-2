@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 pb-20 animate-in fade-in slide-in-from-bottom-6 duration-700">
    
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
        <div>
            <nav class="flex items-center space-x-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-3">
                <a href="{{ route('dashboard') }}" class="hover:text-indigo-600 transition">Portal</a>
                <span>/</span>
                <span class="text-indigo-600">Settings</span>
            </nav>
            <h2 class="text-4xl font-black text-slate-900 tracking-tight">Account Configuration</h2>
            <p class="text-slate-500 font-medium mt-1">Keep your contact details and preferences up to date.</p>
        </div>
        
        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-white border border-slate-200 text-slate-600 font-bold text-sm rounded-2xl hover:bg-slate-50 transition shadow-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2"></path></svg>
            Exit Settings
        </a>
    </div>

    <form action="{{ route('user.settings.update') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-4">
                <div class="sticky top-8 bg-white rounded-[3rem] border border-slate-100 shadow-sm p-8 overflow-hidden group">
                    <div class="absolute -top-12 -right-12 w-32 h-32 bg-indigo-50 rounded-full blur-3xl group-hover:bg-indigo-100 transition duration-1000"></div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-gradient-to-tr from-indigo-600 to-violet-600 text-white rounded-[2.5rem] flex items-center justify-center text-3xl font-black shadow-xl shadow-indigo-100 mb-6">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">{{ $user->name }}</h3>
                        <p class="text-xs font-black text-indigo-500 uppercase tracking-widest mt-2 px-4 py-1 bg-indigo-50 rounded-full">Active Student</p>
                        
                        <div class="w-full mt-10 space-y-5 text-left bg-slate-50/50 p-6 rounded-[2rem] border border-slate-50">
                            <div>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">ID Reference</p>
                                <p class="text-sm font-bold text-slate-700 mt-0.5">{{ $user->student_id }}</p>
                            </div>
                            <div>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Program & Year</p>
                                <p class="text-sm font-bold text-slate-700 mt-0.5">{{ $user->course }} • {{ $user->year_level }}</p>
                            </div>
                            <div class="pt-4 border-t border-slate-200/60">
                                <p class="text-[10px] text-slate-400 font-medium italic leading-relaxed">
                                    Acadmic data is read-only. Visit the Registrar to modify core records.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white rounded-[3rem] border border-slate-100 shadow-sm p-8 md:p-12">
                    <h4 class="text-lg font-bold text-slate-900 mb-10 flex items-center">
                        <span class="w-2 h-2 bg-indigo-600 rounded-full mr-3"></span>
                        Edit Personal Details
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">
                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Full Legal Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-600 outline-none transition-all font-semibold text-slate-700" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Contact Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-600 outline-none transition-all font-semibold text-slate-700" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Phone Number</label>
                            <input type="text" name="contact_no" value="{{ old('contact_no', $user->contact_no) }}"
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-600 outline-none transition-all font-semibold text-slate-700" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Gender</label>
                            <select name="gender" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-600 outline-none transition-all font-semibold text-slate-700 appearance-none">
                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Date of Birth</label>
                            <input type="date" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}"
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-600 outline-none transition-all font-semibold text-slate-700" required>
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Residential Address</label>
                            <textarea name="address" rows="3" 
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-600 outline-none transition-all font-semibold text-slate-700 resize-none" required>{{ old('address', $user->address) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-12 flex justify-end">
                        <button type="submit" 
                            class="w-full md:w-auto px-12 py-4 bg-slate-900 hover:bg-black text-white font-black rounded-2xl shadow-xl shadow-slate-200 transition-all transform hover:-translate-y-1 active:scale-95">
                            Save Changes
                        </button>
                    </div>
                </div>

                <div class="bg-indigo-900 rounded-[2.5rem] p-8 text-white flex items-center justify-between overflow-hidden relative">
                    <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-1/4 translate-y-1/4">
                        <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5z"/></svg>
                    </div>
                    <div class="relative z-10 space-y-1">
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-indigo-300">Data Protection</p>
                        <p class="text-sm font-medium opacity-90 max-w-md">Your updates are encrypted and stored according to our university's privacy standards.</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection