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

        if (!$reservation) {
            abort(404);
        }

        $reservationData = [
            'name' => $reservation->user->fname . ' ' . $reservation->user->lname,
            'price' => $reservation->event->price, // Replace with actual data
            'position' => $reservation->event->adress, // Replace with actual data
            'eventName' => $reservation->event->title,
            'eventDescription' => $reservation->event->description,// Replace with actual data
            'eventDate' => \Carbon\Carbon::parse($reservation->event->date)->format('l, F j, H:i'),
            // Add other reservation details as needed
        ];

        if ($request->has('preview')) {
            $reservationData['css'] = 'css/ticket.css';
            return view('ticket', $reservationData);
        } else {
            $reservationData['css'] = public_path('css/ticket.css');
        }

        $pdf = Pdf::loadView('ticket', $reservationData);

        # Option 1) Download the PDF
        return $pdf->download('ticket.pdf');
    }
}
