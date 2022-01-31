<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Customer;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
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
