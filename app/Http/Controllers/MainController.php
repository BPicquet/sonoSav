<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Ticket;
use App\Models\Customer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

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
        $tickets    = Ticket::orderBy('id', 'DESC')->paginate(10);
        $title      = 'Tous les tickets';
        $color      = 'bg-primary';

        return view('tickets', [
            'tickets'   => $tickets,
            'title'     => $title,
            'color'     => $color
        ]);
    }

    public function stateProcessing()
    {
        $tickets = Ticket::where('state_id', 1)->paginate(10);

        return view('tickets', [
            'tickets'   => $tickets,
            'title'     => 'Traitements',
            'color'     => 'bg-primary'
        ]);
    }

    public function stateSending()
    {
        $tickets = Ticket::where('state_id', 2)->paginate(10);

        return view('tickets', [
            'tickets'   => $tickets,
            'title'     => 'Envoie',
            'color'     => 'bg-info'
        ]);
    }

    public function stateRepairing()
    {
        $tickets = Ticket::where('state_id', 3)->paginate(10);

        return view('tickets', [
            'tickets'   => $tickets,
            'title'     => 'En réparation',
            'color'     => 'bg-warning'
        ]);
    }

    public function stateAvalaible()
    {
        $tickets = Ticket::where('state_id', 4)->paginate(10);

        return view('tickets', [
            'tickets'   => $tickets,
            'title'     => 'Disponible',
            'color'     => 'bg-success'
        ]);
    }

    public function stateFinished()
    {
        $tickets = Ticket::where('state_id', 5)->paginate(10);

        return view('tickets', [
            'tickets'   => $tickets,
            'title'     => 'Fini',
            'color'     => 'bg-dark'
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
