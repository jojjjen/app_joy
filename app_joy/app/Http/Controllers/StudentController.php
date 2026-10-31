<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // READ
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    // CREATE - Show Form
    public function create()
    {
        return view('students.create');
    }

    // CREATE - Save Student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|unique:students,student_id',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:255',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully!');
    }

    // UPDATE - Show Edit Form
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    // UPDATE - Save Changes
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'student_id' => 'required|string|unique:students,student_id,' . $student->id,
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:255',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    // DELETE
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}