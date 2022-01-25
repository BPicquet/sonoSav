@extends('base')

@section('content')
<div class="bg-dark my-4">
    <h3 class="text-center text-white py-2">{{ $customer->name }} {{ $customer->first_name }}</h3>
</div>
<a href="{{ url()->previous() }}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i>
</a>

<div class="bg-light p-5 rounded-lg my-3">
    <p class="lead my-1">Informations clients</p>
    <hr class="mb-3">
    <div class="row">
        <div class="col d-flex justify-content-between">
            <p class="fw-bold">Nom:&nbsp;</p>
            <p class="text-muted">{{ $customer->name }}</p>
        </div>
        <div class="col d-flex justify-content-between">
            <p class="fw-bold">Prénom:&nbsp;</p>
            <p class="text-muted">{{ $customer->first_name }}</p>
        </div>
        <div class="col d-flex justify-content-between">
            <p class="fw-bold">Téléphone:&nbsp;</p>
            <p class="text-muted">{{ $customer->phone }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex  justify-content-between">
            <p class="fw-bold">Type:&nbsp;</p>
            <p class="text-muted">{{ $customer->customerType->label }}</p>
        </div>
        <div class="col d-flex  justify-content-between">
            <p class="fw-bold">Code Client:&nbsp;</p>
            <p class="text-muted">{{ $customer->code_client }}</p>
        </div>
        <div class="col d-flex  justify-content-between">
            <p class="fw-bold">Email:&nbsp;</p>
            <p class="text-muted">{{ $customer->mail }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex  justify-content-between">
            <p class="fw-bold">Adresse:&nbsp;</p>
            <p class="text-muted">{{ $customer->address }}</p>
        </div>
        <div class="col d-flex  justify-content-between">
            <p class="fw-bold">Ville:&nbsp;</p>
            <p class="text-muted">{{ $customer->city }}</p>
        </div>
        <div class="col d-flex  justify-content-between">
            <p class="fw-bold">Code Postal:&nbsp;</p>
            <p class="text-muted">{{ $customer->postal_code }}</p>
        </div>
    </div>
</div>

<div class="bg-dark p-5 rounded-lg my-3 text-white">
    <p class="lead my-1">Liste S.A.V</p>
    <hr class="mb-3">
    <div>
        <table class="table table-striped table-hover my-4">
            <tbody>
                <tr class="table-light">
                    <th scope="row">1</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->first_name }}</td>
                    <td>Pioneer</td>
                    <td>XDJ RX3</td>
                    <td>En réparation</td>
                    <td>12/10/2022</td>
                </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection