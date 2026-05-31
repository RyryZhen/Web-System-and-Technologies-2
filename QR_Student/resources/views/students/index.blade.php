@extends('layouts.master')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-[#4B6344]">Academy Registry</h1>
        <p class="text-[#8A9A81] italic">Viewing all enrolled students and their unique identifiers.</p>
    </div>
    <a href="{{ route('students.create') }}" class="bg-[#4B6344] text-[#F2F5E9] px-6 py-3 rounded-full font-bold shadow-lg hover:bg-[#3A4D34] transition">
        + Enroll New Student
    </a>
</div>

<form action="{{ route('students.index') }}" method="GET" class="mb-10">
    <div class="relative max-w-xl mx-auto">
        <input type="text" name="search" 
               class="w-full pl-12 pr-4 py-4 rounded-2xl bg-white border-2 border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none shadow-sm" 
               placeholder="Search by name or student number..." 
               value="{{ request('search') }}">
     <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-[#8A9A81]">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
</div>
    </div>
</form>
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
    @forelse($students as $student)
    <div class="bg-white rounded-3xl border-2 border-[#DDEBCC] overflow-hidden hover:shadow-2xl transition duration-300 group">
        <div class="h-24 bg-[#4B6344] relative">
            <span class="absolute top-4 right-4 px-3 py-1 bg-white/20 backdrop-blur-md text-white text-[10px] font-bold rounded-full uppercase tracking-widest border border-white/30">
                {{ $student->status ?? 'Active' }}
            </span>
        </div>
        
        <div class="px-6 pb-6">
            <div class="relative -mt-12 mb-4 flex justify-between items-end">
                <div class="p-1 bg-white rounded-2xl shadow-md">
                    <img src="{{ $student->picture ? asset('storage/' . $student->picture) : 'https://ui-avatars.com/api/?name='.urlencode($student->name).'&background=DDEBCC&color=4B6344' }}" 
                         alt="Profile" 
                         class="w-24 h-24 object-cover rounded-xl border-2 border-white">
                </div>
                <div class="p-2 bg-[#F2F5E9] rounded-xl border border-[#DDEBCC] shadow-inner mb-1">
                    <div class="w-12 h-12">
                        {!! $student->qr !!}
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h3 class="text-xl font-extrabold text-[#2D3A27] leading-tight">{{ $student->name }}</h3>
                <p class="text-xs font-mono text-[#8A9A81]">{{ $student->student_id }}</p>
            </div>

            <div class="grid grid-cols-2 gap-y-3 gap-x-2 text-sm mb-6 bg-[#F9FBF7] p-4 rounded-2xl border border-[#F2F5E9]">
                <div>
                    <p class="text-[10px] uppercase text-[#8A9A81] font-bold">Email</p>
                    <p class="text-[#4B6344] truncate">{{ $student->email }}</p>
                </div>
                <div>
                    <p class="text-[10px] uppercase text-[#8A9A81] font-bold">Phone</p>
                    <p class="text-[#4B6344]">{{ $student->phone }}</p>
                </div>
                <div>
                    <p class="text-[10px] uppercase text-[#8A9A81] font-bold">Course</p>
                    <p class="text-[#4B6344] font-semibold">{{ $student->course }}</p>
                </div>
                <div>
                    <p class="text-[10px] uppercase text-[#8A9A81] font-bold">Date of Birth</p>
                    <p class="text-[#4B6344]">{{ $student->dob }}</p>
                </div>
                <div class="col-span-2 border-t border-[#DDEBCC] pt-2 mt-1">
                    <p class="text-[10px] uppercase text-[#8A9A81] font-bold">Gender</p>
                    <p class="text-[#4B6344]">{{ $student->gender }}</p>
                </div>
            </div>

            <div class="space-y-2">
                <a href="{{ route('students.show', $student->id) }}" 
                   class="block w-full py-2.5 bg-[#4B6344] text-white rounded-xl font-bold hover:bg-[#3A4D34] transition text-sm text-center shadow-md">
                    View Full Profile
                </a>
                <div class="flex gap-2">
                    <a href="{{ route('students.edit', $student->id) }}" 
                       class="flex-1 py-2 bg-white text-[#4B6344] border border-[#DDEBCC] rounded-xl font-bold hover:bg-[#F2F5E9] transition text-xs text-center">
                        Edit
                    </a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Remove student record?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full py-2 bg-white text-red-500 border border-red-100 rounded-xl font-bold hover:bg-red-50 transition text-xs">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    @endforelse
</div>
@endsection