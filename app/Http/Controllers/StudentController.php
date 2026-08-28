<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display all registered students.
     */
    public function index()
    {
        $students = Student::latest()->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly registered student.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:50|unique:students,student_id',

            'first_name' => 'required|string|max:100',

            'middle_name' => 'nullable|string|max:100',

            'last_name' => 'required|string|max:100',

            'email' => 'required|email|max:255|unique:students,email',

            'mobile_number' => 'required|numeric|digits_between:10,15',

            'date_of_birth' => 'required|date',

            'gender' => 'required|in:Male,Female,Other',

            'program' => 'required|string|max:150',

            'year_level' => 'required|in:1st Year,2nd Year,3rd Year,4th Year,5th Year',

            'address' => 'required|string|max:500',

            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Profile Picture
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')
                ->store('student-profiles', 'public');

            $validated['profile_picture'] = $path;
        }

        /*
        |--------------------------------------------------------------------------
        | Create Student
        |--------------------------------------------------------------------------
        */

        $student = Student::create($validated);

        /*
        |--------------------------------------------------------------------------
        | Success Message
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('students.show', $student->id)
            ->with('success', 'Student registered successfully!');
    }

    /**
     * Display a specific student.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the edit profile form.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:50|unique:students,student_id,'.$student->id,

            'first_name' => 'required|string|max:100',

            'middle_name' => 'nullable|string|max:100',

            'last_name' => 'required|string|max:100',

            'email' => 'required|email|max:255|unique:students,email,'.$student->id,

            'mobile_number' => 'required|numeric|digits_between:10,15',

            'date_of_birth' => 'required|date',

            'gender' => 'required|in:Male,Female,Other',

            'program' => 'required|string|max:150',

            'year_level' => 'required|in:1st Year,2nd Year,3rd Year,4th Year,5th Year',

            'address' => 'required|string|max:500',

            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')
                ->store('student-profiles', 'public');

            $validated['profile_picture'] = $path;
        }

        $student->update($validated);

        return redirect()
            ->route('students.show', $student->id)
            ->with('success', 'Profile updated successfully!');
    }
}
