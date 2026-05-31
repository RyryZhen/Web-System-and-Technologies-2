@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 pb-20 animate-in fade-in slide-in-from-bottom-6 duration-700">
    <div class="text-center mb-12">
        <span class="inline-block px-4 py-1.5 bg-indigo-50 text-indigo-600 rounded-full text-[10px] font-black uppercase tracking-[0.2em] mb-4">
            New Enrollment Period
        </span>
        <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Create Student Account</h2>
        <p class="text-slate-500 font-medium mt-3 max-w-xl mx-auto">Initialize your digital academic identity for the 2026-2027 session.</p>
    </div>

    <div class="bg-white rounded-[3.5rem] shadow-sm border border-slate-200/60 overflow-hidden">
        <div class="p-8 md:p-16">
            <form action="{{ route('register.post') }}" method="POST" class="space-y-12">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-20 gap-y-12">
                    
                    <div class="space-y-8">
                        <div class="flex items-center space-x-4">
                            <span class="flex items-center justify-center w-8 h-8 rounded-full bg-indigo-600 text-white text-xs font-bold">1</span>
                            <h4 class="text-slate-900 font-bold text-lg tracking-tight">Academic Profile</h4>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Student ID Number</label>
                                <input type="text" name="student_id" placeholder="2026-0001" value="{{ old('student_id') }}" 
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 outline-none transition-all font-semibold text-slate-700 placeholder:text-slate-300">
                                @error('student_id') <p class="text-red-500 text-[10px] font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Full Name</label>
                                <input type="text" name="name" placeholder="Enter your full name" value="{{ old('name') }}" 
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 outline-none transition-all font-semibold text-slate-700 placeholder:text-slate-300">
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Program</label>
                                    <select name="course" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 outline-none transition-all font-semibold text-slate-700 appearance-none">
                                        <option value="">Select Course</option>
                                        <option value="BSIT">BSIT</option>
                                        <option value="BSCS">BSCS</option>
                                        <option value="BSCpE">BSCpE</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Year Level</label>
                                    <select name="year_level" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 outline-none transition-all font-semibold text-slate-700">
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Account Password</label>
                                <input type="password" name="password" placeholder="••••••••" 
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 outline-none transition-all font-semibold text-slate-700">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="flex items-center space-x-4">
                            <span class="flex items-center justify-center w-8 h-8 rounded-full bg-emerald-500 text-white text-xs font-bold">2</span>
                            <h4 class="text-slate-900 font-bold text-lg tracking-tight">Personal Information</h4>
                        </div>

                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Email Address</label>
                                <input type="email" name="email" placeholder="student@university.edu" value="{{ old('email') }}" 
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 outline-none transition-all font-semibold text-slate-700 placeholder:text-slate-300">
                                @error('email') <p class="text-red-500 text-[10px] font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Birthdate</label>
                                    <input type="date" name="birthdate" value="{{ old('birthdate') }}" 
                                        class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 outline-none transition-all font-semibold text-slate-700 text-sm">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Gender</label>
                                    <select name="gender" class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 outline-none transition-all font-semibold text-slate-700 text-sm">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Mobile Number</label>
                                <input type="text" name="contact_no" placeholder="09XXXXXXXXX" value="{{ old('contact_no') }}" 
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 outline-none transition-all font-semibold text-slate-700">
                            </div>

                            <div class="space-y-2">
                                <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Residential Address</label>
                                <textarea name="address" rows="1" placeholder="Street, City, Province" 
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 outline-none transition-all font-semibold text-slate-700 text-sm resize-none">{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-10 border-t border-slate-100 flex flex-col items-center">
                    <button type="submit" 
                        class="w-full md:w-auto md:px-20 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-5 rounded-2xl shadow-xl shadow-indigo-100 transition-all transform hover:scale-[1.02] active:scale-[0.98] text-lg">
                        Create Account
                    </button>
                    <p class="mt-8 text-slate-400 font-medium text-sm">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-indigo-600 font-bold ml-1 hover:underline underline-offset-4">Sign in here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection