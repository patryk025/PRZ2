<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers.index', [
            'teachers' => Teacher::all(),
        ]);
    }

    public function create()
    {
        return view('teachers.form');
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.form', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'required|string',
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Nauczyciel został zaktualizowany.');
    }

    public function delete(Teacher $teacher)
    {
        return view('teachers.form', compact('teacher'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string',
        ]);

        Teacher::create($request->all());

        return redirect()->route('teachers.index')->with('success', 'Nauczyciel został dodany.');
    }
}
