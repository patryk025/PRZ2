<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kursu',
        'nazwa_zajec',
        'opis_zajec',
        'data_rozpoczecia',
        'godz_rozpoczecia',
        'godz_zakonczenia',
    ];

    protected $dates = [
        'data_rozpoczecia',
        'created_at',
        'updated_at',
    ];
}
