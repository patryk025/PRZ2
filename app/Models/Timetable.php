<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'nazwa_zajec',
        'opis_zajec',
        'data_rozpoczecia',
        'data_zakonczenia',
    ];

    protected $dates = [
        'data_rozpoczecia',
        'data_zakonczenia',
        'created_at',
        'updated_at',
    ];
}
