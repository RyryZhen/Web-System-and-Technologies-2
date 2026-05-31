@extends('layouts.master')

@section('title', 'Library - All Books')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
        <div>
            <h1 class="text-4xl font-serif font-bold text-[#586445]">All Books</h1>
            <p class="text-[#A7AD8C] font-medium">Manage your curated collection.</p>
        </div>
        
        <a href="{{ route('books.create') }}" 
           class="inline-flex items-center justify-center px-6 py-3 bg-[#586445] text-[#F2F4E8] rounded-2xl font-bold shadow-lg shadow-[#586445]/20 hover:bg-[#3A422E] transition-all transform hover:-translate-y-1">
            <span class="mr-2">+</span> Add New Book
        </a>
    </div>

    <div class="bg-white/70 backdrop-blur-sm rounded-[2.5rem] border border-[#D1D5C2]/50 p-2 md:p-6 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-separate border-spacing-y-3">
                <thead>
                    <tr class="text-[#A7AD8C] text-xs uppercase tracking-[0.2em] font-bold">
                        <th class="px-6 py-4">Title & Author</th>
                        <th class="px-6 py-4">Published</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="bg-[#F2F4E8]/50 hover:bg-[#F2F4E8] transition-colors group">
                            <td class="px-6 py-5 rounded-l-3xl">
                                <p class="font-serif text-lg text-[#586445] font-bold">{{ $book->title }}</p>
                                <p class="text-sm text-[#A7AD8C]">by {{ $book->author }}</p>
                            </td>
                            
                            <td class="px-6 py-5">
                                <span class="text-sm font-medium text-[#586445]/80">
                                    {{ \Carbon\Carbon::parse($book->published_date)->format('M d, Y') }}
                                </span>
                            </td>

                            <td class="px-6 py-5 rounded-r-3xl text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('books.edit', $book->id) }}" 
                                       class="p-2 text-[#A7AD8C] hover:text-[#586445] transition-colors">
                                        Edit
                                    </a>
                                    
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this book?')"
                                                class="bg-[#586445]/10 hover:bg-red-50 text-red-700 px-4 py-2 rounded-xl text-xs font-bold transition-all">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if($books->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center py-20 text-[#A7AD8C] italic">
                                No books found in the archive.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection