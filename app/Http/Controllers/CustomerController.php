<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Customer;
use App\Models\CustomerType;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(10);

        return view('customer.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create', [
            'customerTypes' => CustomerType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        Customer::create([
            'name'              => $request->input('last_name'),
            'first_name'        => $request->input('first_name'),
            'code_client'       => $request->input('code_client'),
            'customer_type_id'  => $request->input('customer_type'),
            'phone'             => $request->input('phone'),
            'mail'              => $request->input('mail'),
            'address'           => $request->input('address'),
            'postal_code'       => $request->input('postal_code'),
            'city'              => $request->input('city'),
        ]);

        return redirect()->route('customers.index')->with('success', 'Le client a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::where('id', $id)->firstOrFail();
        $tickets = Ticket::all()->where('customer_id', $id);

        return view('customer.show', [
            'customer' => $customer,
            'tickets'  => $tickets
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
        $customer = Customer::where('id', $id)->firstOrFail();

        return view('customer.edit', [
            'customer'          => $customer,
            'customerTypes'     => CustomerType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::where('id', $id)->firstOrFail();

        $customer->name         = $request->input('last_name');
        $customer->first_name   = $request->input('first_name');
        $customer->code_client  = $request->input('code_client');
        $customer->customer_type_id = $request->input('customer_type');
        $customer->phone        = $request->input('phone');
        $customer->mail         = $request->input('mail');
        $customer->address      = $request->input('address');
        $customer->postal_code  = $request->input('postal_code');
        $customer->city         = $request->input('city');
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'La fiche client à bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $customer = Customer::where('id', $id)->firstOrFail();
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Le client à bien été supprimé de la base de donnée.');
    }
}
