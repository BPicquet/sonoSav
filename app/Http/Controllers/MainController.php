<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }
    /* Generate PDF */
    public function createPDF($id) {
        $ticket = Ticket::where('id', $id)->firstOrFail();
        
        view()->share('ticket', $ticket);
        $pdf = PDF::loadView('pdf_view', compact($ticket));
  
        return $pdf->stream();
      }

    /* Ticket */
    public function index()
    {
        $tickets = Ticket::orderBy('id', 'DESC')->paginate(10);

        return view('tickets', [
            'tickets' => $tickets
        ]);
    }

    public function show($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();

        return view('ticket', [
            'ticket'    => $ticket
        ]);
    }
}
