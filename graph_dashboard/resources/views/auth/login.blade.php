<x-guest-layout>
    <div class="fixed inset-0 flex flex-col md:flex-row overflow-hidden">
        
        <!-- Left Side: The "Vibe" Column (StarBarak Aesthetic) -->
        <div class="hidden md:flex md:w-1/2 bg-[#1E3932] items-center justify-center relative p-12">
            <!-- Decorative StarBarak Swirls (SVG Background) -->
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
                <h1 class="text-5xl font-black text-white tracking-tighter mb-4">StarBarak<span class="text-[#4CAF50]">BOY</span></h1>
                <p class="text-emerald-200/60 text-lg font-medium italic italic">"A better way to brew your data."</p>
            </div>
            
            <!-- Bottom Accent -->
            <div class="absolute bottom-10 left-10 text-emerald-500/30 font-black tracking-[0.5em] text-xs">
                EST 2026 / PREMIUM ANALYTICS
            </div>
        </div>

        <!-- Right Side: The Login Form -->
        <div class="w-full md:w-1/2 bg-[#F8FAF5] flex items-center justify-center p-8">
            <div class="w-full max-w-md">
                
                <div class="mb-10">
                    <h2 class="text-3xl font-black text-[#1E3932] tracking-tight">Sign In</h2>
                    <p class="text-emerald-600/60 font-semibold mt-2">Welcome back to the dashboard.</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label class="block text-[10px] font-black text-emerald-800 uppercase tracking-widest mb-2">Account Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                               class="block w-full px-5 py-4 bg-white border border-emerald-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-[#00704A] transition-all placeholder-emerald-200 text-[#1E3932] font-semibold"
                               placeholder="name@cafe.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="text-[10px] font-black text-emerald-800 uppercase tracking-widest">Security Key</label>
                            @if (Route::has('password.request'))
                                <a class="text-xs text-emerald-600 hover:text-[#00704A] font-bold" href="{{ route('password.request') }}">Forgot?</a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required 
                               class="block w-full px-5 py-4 bg-white border border-emerald-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-[#00704A] transition-all placeholder-emerald-200 text-[#1E3932] font-semibold"
                               placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="w-5 h-5 rounded-lg border-emerald-200 text-[#00704A] focus:ring-[#00704A]" name="remember">
                        <span class="ms-3 text-sm font-bold text-emerald-800/60">Keep me signed in</span>
                    </div>

                    <!-- Login Button -->
                    <div class="pt-4">
                        <button class="w-full bg-[#00704A] hover:bg-[#1E3932] text-white font-black py-5 rounded-[2rem] shadow-xl shadow-emerald-900/20 transition-all active:scale-[0.98] flex items-center justify-center gap-3">
                            <span>Login</span>
                                  </button>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center pt-6">
                        <p class="text-sm text-emerald-800/40 font-bold">
                            New to the boutique? 
                            <a href="{{ route('register') }}" class="text-[#00704A] hover:text-[#1E3932] underline-offset-4 hover:underline ml-1">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>