<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function event()
    {
        $events = Event::whereNotNull('validated_at')->get();
        return view('client.event', compact('events'));
    }

    public function reservation()
    {
        return view('client.reservation');
    }
}
