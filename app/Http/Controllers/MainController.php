<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    public function createPDF($id) 
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
        
        view()->share('ticket', $ticket);
        $pdf = PDF::loadView('pdf_view', compact($ticket));
  
        return $pdf->stream();
    }

    public function users()
    {
        $users = User::all();

        return view('users', [
            'users' => $users
        ]);
    }
}
