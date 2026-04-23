@extends('layouts.master')

@section('title', 'Add to Collection')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10">
        <a href="{{ route('books.index') }}" class="text-[#A7AD8C] hover:text-[#586445] text-sm font-bold flex items-center gap-2 mb-4 transition-colors">
            ← Back to Archive
        </a>
        <h1 class="text-4xl font-serif font-bold text-[#586445]">Add New Book</h1>
        <p class="text-[#A7AD8C] font-medium italic">Expand your curated library.</p>
    </div>

    <div class="bg-white/80 backdrop-blur-md rounded-[2.5rem] border border-[#D1D5C2]/50 p-8 md:p-12 shadow-sm">
        <form action="{{ route('books.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="title" class="block text-xs uppercase tracking-widest font-bold text-[#586445] mb-2 ml-1">Book Title</label>
                <input type="text" id="title" name="title" required
                    placeholder="e.g. The Great Gatsby"
                    class="w-full bg-[#F2F4E8]/50 border-none focus:ring-2 focus:ring-[#586445]/20 rounded-2xl p-4 text-[#282C22] placeholder-[#A7AD8C]/60 transition-all">
            </div>

            <div>
                <label for="author" class="block text-xs uppercase tracking-widest font-bold text-[#586445] mb-2 ml-1">Author Name</label>
                <input type="text" id="author" name="author" required
                    placeholder="e.g. F. Scott Fitzgerald"
                    class="w-full bg-[#F2F4E8]/50 border-none focus:ring-2 focus:ring-[#586445]/20 rounded-2xl p-4 text-[#282C22] placeholder-[#A7AD8C]/60 transition-all">
            </div>

            <div>
                <label for="published_date" class="block text-xs uppercase tracking-widest font-bold text-[#586445] mb-2 ml-1">Published Date</label>
                <input type="date" id="published_date" name="published_date" required
                    class="w-full bg-[#F2F4E8]/50 border-none focus:ring-2 focus:ring-[#586445]/20 rounded-2xl p-4 text-[#282C22] transition-all">
            </div>

            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-[#586445] text-[#F2F4E8] font-bold py-4 rounded-2xl shadow-lg shadow-[#586445]/20 hover:bg-[#3A422E] transition-all transform hover:-translate-y-1">
                    Save to Collection
                </button>
            </div>
        </form>
    </div>
</div>
@endsection