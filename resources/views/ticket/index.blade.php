@extends('base')

@section('content')
    <div class="bg-warning my-4">
        <h3 class="text-center text-white py-2">Espace Admin</h3>
    </div>
    <table class="table table-striped table-hover my-4">
        <thead>
          <tr class="table-dark">
            <th scope="col">id</th>
            <th scope="col">Prix</th>
            <th scope="col">Créé le</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr class="table-light">
                    <th scope="row"><a href={{ route('ticket', $ticket->id) }}>{{ $ticket->id }}</a></th>
                    <td>{{ $ticket->price }}</td>
                    <td>{{ $ticket->dateFormated() }}</td>
                    <td class="d-flex">
                      <a href="" class="btn btn-warning mx-2"><i class="fas fa-cogs"></i></a>
                      <a href="" class="btn btn-danger mx-2"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      <div class="d-flex justify-content-center m-5">
        {{ $tickets->links('vendor.pagination.custom') }}
      </div>
@endsection