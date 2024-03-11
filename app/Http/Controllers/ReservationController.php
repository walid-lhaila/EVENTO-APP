<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $eventId = $request->input('event_id');
        $userId = Auth::id();
        $person = $request->input('person');

        $event = Event::find($eventId);

        if($event && $event->type_reserve === 'automatic'){
            $validated_at = now();
        }else{
            $validated_at = null;
        }

        $reservation = Reservation::create([
            'event_id' => $eventId,
            'user_id' => $userId,
            'person' => $person,
            'validated_at' => $validated_at,
        ]);
        $event = Event::find($eventId);

        // Calculate remaining seats after reservation
        $remainingSeats = $event->remainingSeats();
        return redirect()->back()->with('success'. $remainingSeats);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
