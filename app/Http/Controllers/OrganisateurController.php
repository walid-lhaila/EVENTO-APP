<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganisateurController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $notification = Reservation::whereHas('event', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereNull('validated_at')->count();

        $reservationCount = Reservation::whereHas('event', function($query) use ($user){
           $query->where('user_id', $user->id);
        })->whereNotNull('validated_at')->count();

        if ($user) {
            $reservations = Reservation::whereNull('validated_at')
                ->whereHas('event', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->with(['event', 'user'])
                ->get();
        } else {

            return redirect()->route('login')->with('error', 'Please log in to view reservations.');
        }

        $categories = Category::all();
        $events = Event::where('user_id', Auth::id())->whereNotNull('validated_at')->paginate(6);
        $countValidatedEvents = Event::where('user_id', Auth::id())->whereNotNull('validated_at')->count();
        return view('organisateur.home', compact('categories', 'events', 'countValidatedEvents', 'reservations', 'notification', 'reservationCount'));
    }

    public function acceptReservation($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $reservation->validated_at = now();
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation Accepted Successfully');
    }

    public function deleteReservation($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $reservation->delete();

        return redirect()->back()->with('Reservation Deleted Successfully');
    }


}
