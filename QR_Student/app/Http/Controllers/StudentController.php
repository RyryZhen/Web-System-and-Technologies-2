<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Search logic
        $students = Student::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('student_id', 'like', "%{$search}%");
        })->get();

        // Attach QR code to each student for the list view
        $students->map(function ($student) {
            $student->qr = QrCode::size(80)->generate(route('students.show', $student->id));
            return $student;
        });

        return view('students.index', compact('students'));
    }

    public function create() { return view('students.create'); }
public function store(Request $request)
{
    // 1. Validate EVERY field sent from the form
    $validated = $request->validate([
        'student_id' => 'required|unique:students',
        'name'       => 'required',
        'email'      => 'required|email|unique:students',
        'course'     => 'required',
        'phone'      => 'required',
        'dob'        => 'required|date',
        'gender'     => 'required',
        'picture'    => 'required|image|max:2048',
    ]);

    // 2. Handle the file upload
    if ($request->hasFile('picture')) {
        $path = $request->file('picture')->store('students', 'public');
        $validated['picture'] = $path; // Add path to the validated array
    }

    // 3. Save to Database
    // This now contains name, student_id, picture, email, course, phone, dob, and gender
    Student::create($validated);

    return redirect()->route('students.index')->with('success', 'Student added!');
}

    public function show(Student $student) {
        // Encode all student data into the QR Code
        $studentData = json_encode([
            'ID' => $student->student_id,
            'Full Name' => $student->name,
            'Email' => $student->email,
            'Course' => $student->course
        ]);
        
        $qr = QrCode::size(250)->color(0, 0, 102)->generate($studentData);
        return view('students.show', compact('student', 'qr'));
    }

    // Show the edit form
public function edit(Student $student)
{
    return view('students.edit', compact('student'));
}

public function update(Request $request, Student $student)
{
    // 1. You MUST list the fields here, or Laravel ignores them
    $validated = $request->validate([
        'name'       => 'required',
        'student_id' => 'required|unique:students,student_id,' . $student->id,
        'email'      => 'required|email',
        'course'     => 'required',
        'phone'      => 'required', // <--- If this is missing, DB gets NULL
        'dob'        => 'required|date',
        'gender'     => 'required',
        'picture'    => 'nullable|image|max:2048',
    ]);

    // 2. Handle the picture if uploaded
    if ($request->hasFile('picture')) {
        $path = $request->file('picture')->store('students', 'public');
        $validated['picture'] = $path;
    }

    // 3. Update the student with the WHOLE validated array
    $student->update($validated);

    return redirect()->route('students.index')->with('success', 'Registry Updated!');
}

// Remove the student
public function destroy(Student $student)
{
    $student->delete();
    return redirect()->route('students.index')->with('success', 'Student record removed.');
}
}