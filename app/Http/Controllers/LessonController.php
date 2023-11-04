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


class LessonController extends Controller
{
    public function index()
    {
        
    }

    public function create(Request $request)
    {
        $data = $request->input('data');
        $godz_rozpoczecia = $request->input('godz_rozpoczecia');
        $godz_zakonczenia = $request->input('godz_zakonczenia');
        $nazwa_zajec = $request->input('nazwa_zajec');
        $opis_zajec = $request->input('opis_zajec');
        $id_kursu = $request->input('id_kursu');

        $lesson = new Timetable;
        $lesson->id_kursu = $id_kursu;
        $lesson->nazwa_zajec = $nazwa_zajec;
        $lesson->opis_zajec = $opis_zajec;
        $lesson->data_rozpoczecia = $data;
        $lesson->godz_rozpoczecia = $godz_rozpoczecia;
        $lesson->godz_zakonczenia = $godz_zakonczenia;
        $lesson->

        $lesson->save();

        return redirect()->route('courses.index');
    }

    public function edit(Timetable $course)
    {
        
    }

    public function update(Request $request, Timetable $course)
    {

    }

    public function show($id)
    {
        
    }

    public function delete()
    {
        
    }

    public function store(Request $request)
    {
        
    }
}
