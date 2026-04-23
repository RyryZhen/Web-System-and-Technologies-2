@extends('layouts.master')

@section('title', 'Edit: ' . $book->title)

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10">
        <a href="{{ route('books.index') }}" class="text-[#A7AD8C] hover:text-[#586445] text-sm font-bold flex items-center gap-2 mb-4 transition-colors">
            ← Cancel and Return
        </a>
        <h1 class="text-4xl font-serif font-bold text-[#586445]">Edit Book</h1>
        <p class="text-[#A7AD8C] font-medium italic">Modifying: <span class="text-[#586445]">{{ $book->title }}</span></p>
    </div>

    <div class="bg-white/80 backdrop-blur-md rounded-[2.5rem] border border-[#D1D5C2]/50 p-8 md:p-12 shadow-sm relative overflow-hidden">
        <div class="absolute -top-6 -right-6 w-24 h-24 bg-[#F2F4E8] rounded-full opacity-50"></div>

        <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-6 relative z-10">
            @csrf
            @method('PUT')
            
            <div>
                <label for="title" class="block text-xs uppercase tracking-widest font-bold text-[#586445] mb-2 ml-1">Book Title</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}" required
                    class="w-full bg-[#F2F4E8]/50 border-none focus:ring-2 focus:ring-[#586445]/20 rounded-2xl p-4 text-[#282C22] transition-all">
            </div>

            <div>
                <label for="author" class="block text-xs uppercase tracking-widest font-bold text-[#586445] mb-2 ml-1">Author Name</label>
                <input type="text" id="author" name="author" value="{{ $book->author }}" required
                    class="w-full bg-[#F2F4E8]/50 border-none focus:ring-2 focus:ring-[#586445]/20 rounded-2xl p-4 text-[#282C22] transition-all">
            </div>

            <div>
                <label for="published_date" class="block text-xs uppercase tracking-widest font-bold text-[#586445] mb-2 ml-1">Published Date</label>
                <input type="date" id="published_date" name="published_date" value="{{ $book->published_date }}" required
                    class="w-full bg-[#F2F4E8]/50 border-none focus:ring-2 focus:ring-[#586445]/20 rounded-2xl p-4 text-[#282C22] transition-all">
            </div>

            <div class="pt-4 flex flex-col sm:flex-row gap-4">
                <button type="submit" 
                    class="flex-1 bg-[#586445] text-[#F2F4E8] font-bold py-4 rounded-2xl shadow-lg shadow-[#586445]/20 hover:bg-[#3A422E] transition-all transform hover:-translate-y-1">
                    Update Book
                </button>
                
                <a href="{{ route('books.index') }}" 
                    class="flex-1 bg-white border border-[#D1D5C2] text-[#586445] font-bold py-4 rounded-2xl text-center hover:bg-[#F2F4E8] transition-all">
                    Discard Changes
                </a>
            </div>
        </form>
    </div>
</div>
@endsection