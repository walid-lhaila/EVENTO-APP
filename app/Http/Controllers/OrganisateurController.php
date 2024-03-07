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
        $categories = Category::all();
        $user = Auth::user();
        $reservations = $user->events()->with('reservation')->get();
        $events = Event::where('user_id', Auth::id())->whereNotNull('validated_at')->paginate(6);
        $countValidatedEvents = Event::where('user_id', Auth::id())->whereNotNull('validated_at')->count();
        return view('organisateur.home', compact('categories', 'events', 'countValidatedEvents', 'reservations'));
    }
}
