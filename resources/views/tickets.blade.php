@extends('base')

@section('content')
    <div class="bg-primary my-4">
        <h3 class="text-center text-white py-3 {{ $color }}">{{ $title }}</h3>
    </div>
    <table class="table table-striped table-hover my-4">
        <thead>
          <tr class="table-dark">
            <td></td>
            <th scope="col">id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Marque</th>
            <th scope="col">Modèle</th>
            <th scope="col">État</th>
            <th scope="col">Date de l'état</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr class="table-light">
                    <td><a href="{{ route('ticket', $ticket->id) }}"><i class="fas fa-eye"></i></a></td>
                    <th scope="row">{{ $ticket->id }}</a></th>
                    <td>{{ $ticket->customerTicket->name }}</td>
                    <td><a href="{{ route('customers.show', $ticket->customerTicket->id ) }}">{{ $ticket->customerTicket->first_name}}</a></td>
                    <td>{{ $ticket->brand }}</td>
                    <td>{{ $ticket->model }}</td>
                    <td>
                      @if($ticket->state_id === 1)
                        <span class="badge bg-primary">Traitement</span>
                      @elseif($ticket->state_id === 2)
                        <span class="badge bg-info">Envoie</span>
                      @elseif($ticket->state_id === 3)
                        <span class="badge bg-warning">Réparation</span>
                      @elseif($ticket->state_id === 4)
                        <span class="badge bg-success">Disponible</span>
                      @elseif($ticket->state_id === 5)
                        <span class="badge bg-dark">Fini</span>
                      @endif
                    </td>
                    <td>{{ $ticket->stateTicket->dateFormated() }}</td>
                    <td>
                      <a href=""><i class="fas fa-cogs fa-lg text-black"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center m-5">
        {{ $tickets->links('vendor.pagination.custom') }}
      </div>
@endsection