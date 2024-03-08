<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $reservationCount = Reservation::whereNotNull('validated_at')->count();
        $events = Event::whereNull('validated_at')->get();
        $organisateurCount = User::whereRole('organisateur')->count();
        $clientCount = User::whereRole('client')->count();
        $eventCount = Event::whereNotNull('validated_at')->count();
        return view('admin.dashboard', compact('users', 'events', 'organisateurCount', 'clientCount', 'eventCount', 'reservationCount'));
    }
    public function category()
    {
        return view('admin.category');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function acceptEvent($eventId)
    {
        $event = Event::findOrFail($eventId);
        $event->validated_at = now(); // Set the validated_at attribute directly
        $event->save();

        return redirect()->back()->with('success', 'Event Accepted successfully');
    }

    public function declineEvent($eventId)
    {
        $event = Event::findOrFail($eventId);
        $event->delete();

        return redirect()->back()->with('success', 'Event Deleted successfully');

    }

}
