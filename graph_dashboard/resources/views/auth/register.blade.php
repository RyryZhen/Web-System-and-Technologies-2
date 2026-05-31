<x-guest-layout>
    <div class="fixed inset-0 flex flex-col md:flex-row overflow-hidden">
        
        <!-- Left Side: The "Vibe" Column (Consistent with Login) -->
        <div class="hidden md:flex md:w-1/2 bg-[#1E3932] items-center justify-center relative p-12">
            <!-- Decorative Matcha Swirls -->
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M0 100 C 20 0 50 0 100 100" stroke="white" fill="transparent" stroke-width="0.5"/>
                    <path d="M0 80 C 30 20 60 20 100 80" stroke="white" fill="transparent" stroke-width="0.5"/>
                </svg>
            </div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-[#00704A] rounded-[2.5rem] shadow-2xl mb-8 border border-white/20">
                    <span class="text-5xl font-serif italic text-white leading-none mt-1">M</span>
                </div>
                <h1 class="text-5xl font-black text-white tracking-tighter mb-4">JOIN THE<span class="text-[#4CAF50]">CLUB</span></h1>
                <p class="text-emerald-200/60 text-lg font-medium italic italic">"Fresh data, harvested daily."</p>
            </div>
            
            <div class="absolute bottom-10 left-10 text-emerald-500/30 font-black tracking-[0.5em] text-xs">
                EST 2026 / MATCHA BOY ANALYTICS
            </div>
        </div>

        <!-- Right Side: The Registration Form -->
        <div class="w-full md:w-1/2 bg-[#F8FAF5] flex items-center justify-center p-8 overflow-y-auto">
            <div class="w-full max-w-md py-12">
                
                <div class="mb-10">
                    <h2 class="text-3xl font-black text-[#1E3932] tracking-tight">Create Account</h2>
                    <p class="text-emerald-600/60 font-semibold mt-2">Start your premium brewing journey.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="block text-[10px] font-black text-emerald-800 uppercase tracking-widest mb-2">Full Name</label>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                               class="block w-full px-5 py-3.5 bg-white border border-emerald-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-[#00704A] transition-all placeholder-emerald-200 text-[#1E3932] font-semibold"
                               placeholder="Coffee Lover">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label class="block text-[10px] font-black text-emerald-800 uppercase tracking-widest mb-2">Email Address</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                               class="block w-full px-5 py-3.5 bg-white border border-emerald-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-[#00704A] transition-all placeholder-emerald-200 text-[#1E3932] font-semibold"
                               placeholder="matcha@boy.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-[10px] font-black text-emerald-800 uppercase tracking-widest mb-2">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                               class="block w-full px-5 py-3.5 bg-white border border-emerald-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-[#00704A] transition-all placeholder-emerald-200 text-[#1E3932] font-semibold"
                               placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-[10px] font-black text-emerald-800 uppercase tracking-widest mb-2">Repeat Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                               class="block w-full px-5 py-3.5 bg-white border border-emerald-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-[#00704A] transition-all placeholder-emerald-200 text-[#1E3932] font-semibold"
                               placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Register Button -->
                    <div class="pt-4">
                        <button class="w-full bg-[#00704A] hover:bg-[#1E3932] text-white font-black py-5 rounded-[2rem] shadow-xl shadow-emerald-900/20 transition-all active:scale-[0.98] flex items-center justify-center gap-3">
                            <span>CREATE ACCOUNT</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center pt-4">
                        <p class="text-sm text-emerald-800/40 font-bold">
                            Already part of the brew? 
                            <a href="{{ route('login') }}" class="text-[#00704A] hover:text-[#1E3932] font-black underline-offset-4 hover:underline ml-1">Sign In</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>