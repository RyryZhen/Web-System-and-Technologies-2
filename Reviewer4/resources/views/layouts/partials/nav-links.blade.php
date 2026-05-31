<a href="{{ route('books.index') }}" 
   class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('books.index') ? 'bg-[#586445] text-white' : 'hover:bg-[#586445]/10 text-[#586445]' }} rounded-2xl font-medium transition-all">
    <span class="text-lg">📚</span> All Books
</a>

<a href="{{ route('books.create') }}" 
   class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('books.create') ? 'bg-[#586445] text-white' : 'hover:bg-[#586445]/10 text-[#586445]' }} rounded-2xl font-medium transition-all">
    <span class="text-lg">✍️</span> Add New
</a>