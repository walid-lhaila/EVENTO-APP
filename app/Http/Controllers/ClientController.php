<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

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
        return view('client.reservation');
    }
}
