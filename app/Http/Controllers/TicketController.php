<?php

namespace App\Http\Controllers;

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
        $tickets = Ticket::paginate(15);
        
        // Retourne la vue dans 'ticket/index'
        return view('ticket.index', [
            'tickets' => $tickets
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
        ]);

        return redirect()->route('tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
