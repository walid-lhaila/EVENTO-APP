<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;



class TicketController extends Controller
{


    public function ticket()
    {
        return view('ticket');
    }
    public function generate(Request $request, $reservationId)
    {
        $reservation = Reservation::with('event')->find($reservationId);
        $event = $reservation->event;

        $data=['reservation'=> $reservation];
        $pdf = Pdf::loadView('ticket', $data);
        return $pdf->download('ticket.pdf');
    }
}
