<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index', compact('reservations'));
    }

    public function create()
    {
        $halls = Hall::all();
        return view('reservation.create', compact('halls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'hall_id' => 'required|exists:halls,id'
        ]);

        $reservation = new Reservation();
        $reservation->hall_id = $request->hall_id;
        $reservation->user_id = auth()->user()->id;
        $reservation->description = $request->description;
        $reservation->reservation_date = $request->date . ' ' . $request->time;        
        $reservation->save();

        return redirect()->route('reservations.index')->with('message', 'Rezerwacja została pomyślnie zapisana.');
    }
}