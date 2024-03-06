<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $events = Event::whereNotNull('validated_at')->paginate(6);
        $countValidatedEvents = Event::whereNotNull('validated_at')->count();
        return view('organisateur.home', compact('categories', 'events', 'countValidatedEvents'));
    }
}
