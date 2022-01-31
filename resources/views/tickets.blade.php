@extends('base')

@section('content')
    <div class="bg-primary my-4">
        <h3 class="text-center text-white py-3">Tous les tickets</h3>
    </div>
    <table class="table table-striped table-hover my-4">
        <thead>
          <tr class="table-dark">
            <th scope="col">id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Marque</th>
            <th scope="col">Modèle</th>
            <th scope="col">État</th>
            <th scope="col">Date de l'état</th>
          </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr class="table-light">
                    <th scope="row"><a href={{ route('ticket', $ticket->id) }}>{{ $ticket->id }}</a></th>
                    <td>{{ $ticket->customerTicket->name }}</td>
                    <td><a href="{{ route('customers.show', $ticket->customerTicket->id ) }}">{{ $ticket->customerTicket->first_name}}</a></td>
                    <td>{{ $ticket->brand }}</td>
                    <td>{{ $ticket->model }}</td>
                    <td>
                      <select class="form-select" name="state">
                          <option value="">Traitement</option>     
                          <option value="">Envoie</option>  
                          <option value="">Réparation</option>  
                          <option value="">Disponible</option>   
                          <option value="">Fini</option>        
                      </select>
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center m-5">
        {{ $tickets->links('vendor.pagination.custom') }}
      </div>
@endsection