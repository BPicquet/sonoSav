<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Ticket;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets    = Ticket::orderBy('id', 'DESC')->paginate(8);
        $title      = 'Tous les tickets';
        $color      = 'bg-primary';

        return view('ticket.tickets', [
            'tickets'   => $tickets,
            'title'     => $title,
            'color'     => $color
        ]);
    }

    /* State Ticket index */

    public function stateProcessing()
    {
        $tickets = Ticket::where('state_id', 1)->paginate(8);

        return view('ticket.tickets', [
            'tickets'   => $tickets,
            'title'     => 'Traitements',
            'color'     => 'bg-primary'
        ]);
    }

    public function stateSending()
    {
        $tickets = Ticket::where('state_id', 2)->paginate(8);

        return view('ticket.tickets', [
            'tickets'   => $tickets,
            'title'     => 'Envoie',
            'color'     => 'bg-info'
        ]);
    }

    public function stateRepairing()
    {
        $tickets = Ticket::where('state_id', 3)->paginate(8);

        return view('ticket.tickets', [
            'tickets'   => $tickets,
            'title'     => 'En réparation',
            'color'     => 'bg-warning'
        ]);
    }

    public function stateAvalaible()
    {
        $tickets = Ticket::where('state_id', 4)->paginate(8);

        return view('ticket.tickets', [
            'tickets'   => $tickets,
            'title'     => 'Disponible',
            'color'     => 'bg-success'
        ]);
    }

    public function stateFinished()
    {
        $tickets = Ticket::where('state_id', 5)->paginate(8);

        return view('ticket.tickets', [
            'tickets'   => $tickets,
            'title'     => 'Fini',
            'color'     => 'bg-dark'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();

        return view('ticket.create', [
            'customers' => $customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        Ticket::create([
            'customer_id'               => $request->input('customer_id'),
            'number_invoice'            => $request->input('number_invoice'),
            'purchase_date'             => $request->input('purchase_date'),
            'category'                  => $request->input('category'),
            'brand'                     => $request->input('brand'),
            'model'                     => $request->input('model'),
            'serial_number'             => $request->input('serial_number'),
            'breakdown'                 => $request->input('breakdown'),
            'exchange_type'             => $request->input('exchange_type'),
            'exchange_number_ticket'    => $request->input('exchange_number'),
            'prior_agreement'           => $request->input('prior_agreement'),
            'price'                     => $request->input('price'),
            'rules_sav'                 => $request->input('rules_checkbox'),
            /* La personne qui créé le ticket est la personne connecté */
            'created_by_id'             => Auth::id(),
            'state_id'                  => 1
        ]);

        return redirect()->route('tickets')->with('success', 'Le ticket a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();

        return view('ticket.ticket', [
            'ticket'    => $ticket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
        $states = State::all();

        return view('ticket.edit', [
            'ticket' => $ticket,
            'states'  => $states
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, $id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();

        $ticket->customer_id                = $ticket->customerTicket->id;
        $ticket->number_invoice             = $request->input('number_invoice');
        $ticket->purchase_date              = $request->input('purchase_date');
        $ticket->category                   = $request->input('category');
        $ticket->brand                      = $request->input('brand');
        $ticket->model                      = $request->input('model');
        $ticket->serial_number              = $request->input('serial_number');
        $ticket->breakdown                  = $request->input('breakdown');
        $ticket->exchange_type              = $request->input('exchange_type');
        $ticket->exchange_number_ticket     = $request->input('exchange_number');
        $ticket->prior_agreement            = $request->input('prior_agreement');
        $ticket->price                      = $request->input('price');
        $ticket->rules_sav                  = 0;
        $ticket->created_by_id              = $ticket->userTicket->id;
        $ticket->state_id                   = $request->input('state_id');
        $ticket->save();

        return redirect()->route('tickets')->with('success', 'Le ticket client a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();

        $ticket->delete();

        return redirect()->route('tickets')->with('success', 'Le ticket à bien été supprimés de la base de donnée.');
    }
}
