<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Timetable;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Builder;
use App\Mail\RegistrationMail;
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
        $data = $request->input('data_rozpoczecia');
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

        if ($lesson->save()) {
            return response()->json([
                'ok' => true,
                'message' => 'Lekcja została pomyślnie utworzona',
                'lesson' => $lesson
            ]);
        }
        else {
            return response()->json([
                'ok' => false,
                'message' => 'Nie udało się utworzyć lekcji'
            ]);
        }
    }

    public function edit(Timetable $course)
    {
        
    }

    public function update(Request $request, int $id, int $timetable_id)
    {
        $course = Timetable::find($timetable_id);

        $data = $request->input('data_rozpoczecia');
        $godz_rozpoczecia = $request->input('godz_rozpoczecia');
        $godz_zakonczenia = $request->input('godz_zakonczenia');
        $nazwa_zajec = $request->input('nazwa_zajec');
        $opis_zajec = $request->input('opis_zajec');

        $course->data_rozpoczecia = $data;
        $course->godz_rozpoczecia = $godz_rozpoczecia;
        $course->godz_zakonczenia = $godz_zakonczenia;
        $course->nazwa_zajec = $nazwa_zajec;
        $course->opis_zajec = $opis_zajec;

        if ($course->save()) {
            return response()->json([
                'ok' => true,
                'message' => 'Lekcja została pomyślnie zaktualizowana',
                'course' => $course
            ]);
        }
        else {
            return response()->json([
                'ok' => false,
                'message' => 'Nie udało się edytować lekcji'
            ]);
        }
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
