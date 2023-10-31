<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Mail\RegistrationMail;
// use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class CoursesController extends Controller
{
    public function index()
    {
        return view(
            'courses.index'
        );
    }

    public function create()
    {
        return view(
            'courses.form'
        );
    }

    public function edit(Course $course)
    {
        return view(
            'courses.form',
            [
                'course' => $course
            ]
        );
    }

    public function update(Request $request, Course $course)
    {

    }

    public function show($id)
    {
        return view(
            'courses.timetable', [
                'course' => Course::find($id)
            ]
        );
    }

    public function delete()
    {
        return view(
            'courses.form'
        );
    }

    public function store(Request $request)
    {
        $course = new Course();
        $course->name = $request->input('name');
        $course->save();

        return redirect()->route('courses.index');
    }

    public function register($id)
    {
        $user = auth()->user();
        //dd($user);
        \Mail::to("patryk.gensch@gmail.com")->send(new RegistrationMail());
        return null;
    }

    // public function async(Request $request) {
    //     return User::query()
    //         ->select('id', 'name')
    //         ->orderBy('name')
    //         ->when(
    //             $request->search,
    //             fn (Builder $query)
    //                 => $query->where('name', 'like', "%{$request->search}%")
    //         )->when(
    //             $request->exists('selected'),
    //             fn (Builder $query) => $query->whereIn(
    //                 'id',
    //                 array_map(
    //                     fn (array $item) => $item['id'],
    //                     array_filter(
    //                         $request->input('selected', []),
    //                         fn ($item) => (is_array($item) && isset($item['id']))
    //                     )
    //                 )
    //             ),
    //             fn (Builder $query) => $query->limit(10)
    //         )->get();
    // }
}
