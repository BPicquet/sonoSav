@extends('base')

@section('content')
    <div class="bg-primary my-4">
        <h3 class="text-center text-white py-3">Clients</h3>
    </div>
    <table class="table table-striped table-hover my-4">
        <thead>
          <tr class="table-dark">
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Email</th>
            <th scope="col">Ville</th>
            <th scope="col">Type</th>
            @if(Auth::user()->role == "ADMIN")
              <th>Actions</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr class="table-light">
                    <th scope="row"><a href="{{ route('customers.show', $customer->id) }}">{{ $customer->name }}</a></th>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->mail }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>{{ $customer->customerType->label }}</td>
                    @if(Auth::user()->role == "ADMIN")
                      <td class="d-flex align-items-center">
                        <a href="{{ route('customers.edit', $customer->id) }}" class="mx-2"><i class="fas fa-cogs fa-lg text-black"></i></a>
                        <a type="submit" class="my-1 mx-2" onclick="onclick(document.querySelector('#modal-open-{{ $customer->id }}').style.display = 'block')">
                          <i class="far fa-trash-alt text-danger"></i>
                        </a>
                        <form action="{{ route('customers.delete', $customer->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <div class="modal" id="modal-open-{{ $customer->id }}">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Suppression</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick=" onclick(document.querySelector('#modal-open-{{ $customer->id }}').style.display = 'none')">
                                    <span aria-hidden="true"></span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Attention: Si vous supprimez ce client, vous supprimez également ses tickets.Souhaitez-vous supprimer ce client ?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Oui</button>
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick=" onclick(document.querySelector('#modal-open-{{ $customer->id }}').style.display = 'none')">Non</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center m-5">
        {{ $customers->links('vendor.pagination.custom') }}
      </div>
@endsection