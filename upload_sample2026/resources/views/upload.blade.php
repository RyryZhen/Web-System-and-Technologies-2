@extends('layouts.master')

@section('title', 'Archive')

@section('content')
<div class="space-y-16">
    
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 text-[10px] tracking-widest uppercase p-4 rounded-xl animate-fade-in">
            ● {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-100 text-red-600 text-[10px] tracking-widest uppercase p-4 rounded-xl">
            ● {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        
        <section class="group">
            <h2 class="serif text-2xl italic text-slate-900 mb-6">Individual Asset</h2>
            <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
                @csrf
                <div class="relative border-2 border-dashed border-slate-200 rounded-2xl p-12 bg-[#fcfaf7]/50 hover:border-slate-400 transition-all text-center">
                    <input type="file" name="image" id="singleInput" required 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <p id="singleLabel" class="text-[10px] text-slate-400 uppercase tracking-widest group-hover:text-slate-600 transition-colors">
                        Select Image
                    </p>
                </div>
                <button type="submit" class="relative z-20 mt-6 bg-slate-900 text-white text-[10px] tracking-[0.2em] uppercase py-4 rounded-full hover:bg-slate-800 transition-all shadow-sm">
                    Upload to Server
                </button>
            </form>
        </section>

        <section class="group">
            <h2 class="serif text-2xl italic text-slate-900 mb-6">Batch Processing</h2>
            <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
                @csrf
                <div class="relative border-2 border-dashed border-slate-200 rounded-2xl p-12 bg-[#fcfaf7]/50 hover:border-slate-400 transition-all text-center">
                    <input type="file" name="images[]" id="batchInput" multiple required 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <p id="batchLabel" class="text-[10px] text-slate-400 uppercase tracking-widest group-hover:text-slate-600 transition-colors">
                        Select Multiple Assets
                    </p>
                </div>
                <button type="submit" class="relative z-20 mt-6 bg-slate-900 text-white text-[10px] tracking-[0.2em] uppercase py-4 rounded-full hover:bg-slate-800 transition-all shadow-sm">
                    Process Batch
                </button>
            </form>
        </section>
    </div>

    @if(isset($photos) && $photos->count() > 0)
    <div class="pt-16 border-t border-slate-100">
        <div class="flex justify-between items-end mb-12">
            <h2 class="serif text-4xl italic text-slate-900 lowercase tracking-tighter">visual archive.</h2>
            
            <form action="{{ route('photos.destroyAll') }}" method="POST" onsubmit="return confirm('Purge entire archive?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-[9px] text-slate-300 hover:text-red-500 border-b border-transparent hover:border-red-500 transition-all uppercase tracking-widest pb-1">
                    Purge All
                </button>
            </form>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-12">
            @foreach($photos as $photo)
                <div class="group">
                    <div class="aspect-[4/5] bg-white rounded-xl overflow-hidden border border-slate-100 shadow-sm transition-all duration-700">
                        <img src="{{ asset('images/' . $photo->image) }}" 
                             class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-105 group-hover:scale-100">
                    </div>
                    
                    <div class="mt-4 flex justify-between items-center px-1">
                        <span class="text-[9px] text-slate-400 uppercase tracking-tighter">Asset_{{ $photo->id }}</span>
                        
                        <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-[9px] text-slate-300 hover:text-red-400 uppercase tracking-widest transition-colors">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-20 flex justify-center">
            {{ $photos->links() }}
        </div>
    </div>
    @else
        <div class="py-20 text-center border-t border-slate-50">
            <p class="serif text-xl text-slate-300 italic">The archive is currently empty.</p>
        </div>
    @endif
</div>

<script>
    // UX for Single Upload
    document.getElementById('singleInput').addEventListener('change', function() {
        if (this.files.length > 0) {
            const fileName = this.files[0].name;
            document.getElementById('singleLabel').innerHTML = `<span class="text-emerald-500 font-bold tracking-normal italic">Ready:</span> ${fileName}`;
        }
    });

    // UX for Batch Upload
    document.getElementById('batchInput').addEventListener('change', function() {
        if (this.files.length > 0) {
            const count = this.files.length;
            document.getElementById('batchLabel').innerHTML = `<span class="text-emerald-500 font-bold">${count} Assets</span> Marked for Upload`;
        }
    });
</script>
@endsection