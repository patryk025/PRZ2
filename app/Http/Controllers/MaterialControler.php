<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialControler extends Controller
{
    public function index($id)
    {
        return view(
            'courses.materials', [
                'course' => Course::find($id)
            ]
        );
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'material' => 'required'
        ]);

        $file = $request->file('material');
        $course_id = $id;

        $filename = time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('materials', $filename, 'public');

        $material = new Material();

        $material->name = $request->name;
        $material->course_id = $course_id;
        $material->path = '/storage/' . $path;

        $material->save();

        return redirect()->back()->with('success', 'Plik został pomyślnie przesłany.');
    }

    public function destroy($id, $material_id)
    {
        $material = Material::find($material_id);

        $material->delete();

        return redirect()->back()->with('success', 'Plik został pomyślnie usunięty.');
    }
}
