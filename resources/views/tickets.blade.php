@extends('base')

@section('content')
    <div class="bg-primary my-4">
        <h3 class="text-center text-white py-2">Tous les tickets</h3>
    </div>
    <table class="table table-striped table-hover my-4">
        <thead>
          <tr class="table-dark">
            <th scope="col">id</th>
            <th scope="col">Prix</th>
            <th scope="col">Accord préalable</th>
            <th scope="col">Client</th>
          </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr class="table-light">
                    <th scope="row"><a href={{ route('ticket', $ticket->id) }}>{{ $ticket->id }}</a></th>
                    <td>{{ $ticket->price }}</td>
                    <td>{{ $ticket->prior_agreement }}</td>
                    <td><a href={{ route('customers.show', $ticket->customerTicket->id ) }}>{{ $ticket->customerTicket->name }} {{ $ticket->customerTicket->first_name }}</a></td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center m-5">
        {{ $tickets->links('vendor.pagination.custom') }}
      </div>
@endsection