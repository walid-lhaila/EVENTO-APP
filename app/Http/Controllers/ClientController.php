<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function event()
    {
        return view('client.event');
    }

    public function reservation()
    {
        return view('client.reservation');
    }
}
