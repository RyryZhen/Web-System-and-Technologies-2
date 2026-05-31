@extends('layouts.master')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-[#4B6344]">Student Enrollment</h2>
        <p class="text-[#8A9A81] italic">Upload a profile picture and enter details to generate the Matcha ID.</p>
    </div>

    <div class="bg-[#F9FBF4] p-8 rounded-3xl border-2 border-[#DDEBCC] shadow-inner">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="flex flex-col items-center mb-8 p-6 bg-white rounded-2xl border-2 border-dashed border-[#DDEBCC]">
                <label class="block text-sm font-bold text-[#4B6344] mb-4 uppercase tracking-widest">Profile Picture</label>
                <div class="relative group">
                    <div id="image-preview-container" class="w-32 h-32 rounded-2xl bg-[#F2F5E9] border-2 border-[#DDEBCC] flex items-center justify-center overflow-hidden mb-4">
                        <svg id="placeholder-icon" xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#8A9A81]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <img id="image-preview" class="hidden w-full h-full object-cover" />
                    </div>
                </div>
                <input type="file" name="picture" id="picture-input" accept="image/*" required
                       class="block w-full text-sm text-[#8A9A81] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[#DDEBCC] file:text-[#4B6344] hover:file:bg-[#C8E0A1] cursor-pointer">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Student ID Number</label>
                    <input type="text" name="student_id" placeholder="e.g. 2024-0001" required
                           class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Full Name</label>
                    <input type="text" name="name" placeholder="Enter complete name" required
                           class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Email Address</label>
                    <input type="email" name="email" placeholder="student@matcha.edu" required
                           class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Phone Number</label>
                    <input type="text" name="phone" placeholder="+63 9xx xxx xxxx" required
                           class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Course/Program</label>
                    <select name="course" required
                            class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                        <option value="">Select Course</option>
                        <option value="BSIT">BS Information Technology</option>
                        <option value="BSCS">BS Computer Science</option>
                        <option value="BSCrim">BS Criminology</option>
                        <option value="BSEntrep">BS Entrepreneurship</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Date of Birth</label>
                    <input type="date" name="dob" required
                           class="w-full p-3 rounded-xl border border-[#DDEBCC] focus:ring-2 focus:ring-[#4B6344] focus:outline-none bg-white">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-[#4B6344] mb-2">Gender</label>
                    <div class="flex space-x-6">
                        <label class="flex items-center text-[#4B6344]">
                            <input type="radio" name="gender" value="Male" class="mr-2 accent-[#4B6344]" checked> Male
                        </label>
                        <label class="flex items-center text-[#4B6344]">
                            <input type="radio" name="gender" value="Female" class="mr-2 accent-[#4B6344]"> Female
                        </label>
                        <label class="flex items-center text-[#4B6344]">
                            <input type="radio" name="gender" value="Other" class="mr-2 accent-[#4B6344]"> Other
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex items-center justify-end space-x-4 border-t border-[#DDEBCC]">
                <a href="{{ route('students.index') }}" class="text-[#8A9A81] hover:text-[#4B6344] font-semibold transition">Cancel</a>
                <button type="submit" 
                        class="bg-[#4B6344] text-[#F2F5E9] px-10 py-4 rounded-full font-bold shadow-lg hover:bg-[#3A4D34] transform hover:-translate-y-1 transition duration-200">
                    Finalize Enrollment 🍵
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview image before uploading
    document.getElementById('picture-input').onchange = evt => {
        const [file] = evt.target.files
        if (file) {
            document.getElementById('image-preview').src = URL.createObjectURL(file)
            document.getElementById('image-preview').classList.remove('hidden')
            document.getElementById('placeholder-icon').classList.add('hidden')
        }
    }
</script>
@endsection