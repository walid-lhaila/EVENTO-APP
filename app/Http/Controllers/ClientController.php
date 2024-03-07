<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function event()
    {
        $events = Event::whereNotNull('validated_at')->get();
        $categories = Category::all();
        return view('client.event', compact('events', 'categories'));
    }

        public function reservation()
        {
            $userId = Auth::id();
            $reservations = Reservation::where('user_id', $userId)->whereNotNull('validated_at')->get();
            return view('client.reservation', compact('reservations'));
        }
}
