@extends('base')

@section('content')
    <h1 class="text-center my-5">Modifier la fiche client de <span class="text-primary">{{ $customer->first_name }} {{ $customer->name }}</span></h1>

    <form action="{{ route('customers.update', $customer->id)}}" method="post">
        @csrf
        @method('put')
        <div class="row d-flex">
            <div class="col">
                <div class="form-group my-3">
                    <label>Nom</label>
                    <input autofocus type="text" value="{{ $customer->name }}" class="form-control @error('last_name') is-invalid @enderror" name="last_name">
                </div>
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <div class="form-group my-3">
                    <label>Prénom</label>
                    <input type="text" value="{{ $customer->first_name }}" class="form-control @error('first_name') is-invalid @enderror" name="first_name">
                </div>
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row d-flex">
            <div class="col">
                <div class="form-group my-3">
                    <label>Code client</label>
                    <input type="text" value="{{ $customer->code_client }}" class="form-control @error('code_client') is-invalid @enderror" name="code_client">
                </div>
                @error('code_client')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <div class="form-group my-3">
                    <label>Type</label>
                    <select class="form-select" name="customer_type">
                        @foreach($customerTypes as $customerType)
                            <option value="{{ $customerType->id }}" {{ $customerType->id === $customer->customerType->id ? 'selected' : '' }}>{{ $customerType->label }}</option>
                        @endforeach                
                    </select>
                </div>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col">
                <div class="form-group my-3">
                    <label>Adresse mail</label>
                    <input type="email" value="{{ $customer->mail }}" class="form-control @error('mail') is-invalid @enderror" name="mail">
                </div>
                @error('mail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <div class="form-group my-3">
                    <label>Téléphone</label>
                    <input type="text" value="{{ $customer->phone }}" class="form-control @error('phone') is-invalid @enderror" name="phone">
                </div>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row d-flex">
            <div class="col">
                <div class="form-group my-3">
                    <label>Adresse</label>
                    <input type="text" value="{{ $customer->address }}" class="form-control @error('address') is-invalid @enderror" name="address">
                </div>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <div class="form-group my-3">
                    <label>Ville</label>
                    <input type="text" value="{{ $customer->city }}" class="form-control @error('city') is-invalid @enderror" name="city">
                </div>
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <div class="form-group my-3">
                    <label>Code Postal</label>
                    <input type="text" value="{{ $customer->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code">
                </div>
                @error('postal_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center mt-5">
            <button type="submit" class="btn btn-primary">Modifier les données</button>
        </div>
    </form>
@endsection