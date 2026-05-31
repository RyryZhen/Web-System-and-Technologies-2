@extends('layouts.master')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8 text-center md:text-left">
        <h2 class="text-3xl font-bold text-[#4B6344]">Update Student Profile</h2>
        <p class="text-[#8A9A81] italic">Refining the details for <strong>{{ $student->name }}</strong>.</p>
    </div>

    <div class="bg-[#F9FBF4] p-8 rounded-3xl border-2 border-[#DDEBCC] shadow-inner">
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col items-center mb-8 p-6 bg-white rounded-2xl border-2 border-dashed border-[#DDEBCC]">
                <label class="block text-sm font-bold text-[#4B6344] mb-4 uppercase tracking-widest">Update Photo</label>
                <div class="relative group">
                    <div id="image-preview-container" class="w-32 h-32 rounded-2xl bg-[#F2F5E9] border-2 border-[#DDEBCC] flex items-center justify-center overflow-hidden mb-4 shadow-md">
                        @if($student->picture)
                            <img id="image-preview" src="{{ asset('storage/' . $student->picture) }}" class="w-full h-full object-cover" />
                        @else
                            <img id="image-preview" src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=DDEBCC&color=4B6344" class="w-full h-full object-cover" />
                        @endif
                    </div>
                </div>
                <input type="file" name="picture" id="picture-input" accept="image/*"
                       class="block w-full text-sm text-[#8A9A81] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[#DDEBCC] file:text-[#4B6344] hover:file:bg-[#C8E0A1] cursor-pointer">
                <p class="text-[10px] text-[#8A9A81] mt-2 italic">Leave blank to keep the current photo.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Student ID Number</label>
                    <input type="text" name="student_id" value="{{ $student->student_id }}" required
                           class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ $student->name }}" required
                           class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ $student->email }}" required
                           class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Phone Number</label>
                    <input type="text" name="phone" value="{{ $student->phone }}" required
                           class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Course</label>
                    <select name="course" required
                            class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                        <option value="BSIT" {{ $student->course == 'BSIT' ? 'selected' : '' }}>BS Information Technology</option>
                        <option value="BSCS" {{ $student->course == 'BSCS' ? 'selected' : '' }}>BS Computer Science</option>
                        <option value="BSCrim" {{ $student->course == 'BSCrim' ? 'selected' : '' }}>BS Criminology</option>
                        <option value="BSEntrep" {{ $student->course == 'BSEntrep' ? 'selected' : '' }}>BS Entrepreneurship</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Date of Birth</label>
                    <input type="date" name="dob" value="{{ $student->dob }}" required
                           class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Gender</label>
                    <div class="flex space-x-6">
                        <label class="flex items-center text-[#4B6344] cursor-pointer">
                            <input type="radio" name="gender" value="Male" class="mr-2 accent-[#4B6344]" {{ $student->gender == 'Male' ? 'checked' : '' }}> Male
                        </label>
                        <label class="flex items-center text-[#4B6344] cursor-pointer">
                            <input type="radio" name="gender" value="Female" class="mr-2 accent-[#4B6344]" {{ $student->gender == 'Female' ? 'checked' : '' }}> Female
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex items-center justify-end space-x-4 border-t border-[#DDEBCC]">
                <a href="{{ route('students.index') }}" class="text-[#8A9A81] hover:text-[#4B6344] font-semibold transition">Cancel</a>
                <button type="submit" 
                        class="bg-[#4B6344] text-white px-10 py-4 rounded-full font-bold shadow-lg hover:bg-[#3A4D34] transform hover:-translate-y-1 transition duration-200">
                    Update Registry 🍵
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Live preview for image update
    document.getElementById('picture-input').onchange = evt => {
        const [file] = evt.target.files
        if (file) {
            document.getElementById('image-preview').src = URL.createObjectURL(file)
        }
    }
</script>
@endsection