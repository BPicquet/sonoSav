@extends('base')

@section('content')
    <h1 class="text-center my-5">Ajout d'un nouveau client</h1>

    <form action="{{ route('customers.store')}}" method="post">
        @csrf
        <div class="row d-flex">
            <div class="col">
                <div class="form-group my-3">
                    <label>Nom</label>
                    <input autofocus type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Doe">
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
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="John">
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
                    <input type="text" class="form-control @error('code_client') is-invalid @enderror" name="code_client" placeholder="12345">
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
                            <option value="{{ $customerType->id }}">{{ $customerType->label }}</option>
                        @endforeach                
                    </select>
                </div>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col">
                <div class="form-group my-3">
                    <label>Adresse mail</label>
                    <input type="email" class="form-control @error('mail') is-invalid @enderror" name="mail" placeholder="john-doe@gmail.com">
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
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="0333333333">
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
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="13 rue du Moulin">
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
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="Paris">
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
                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" placeholder="75000">
                </div>
                @error('postal_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center mt-5">
            <button type="submit" class="btn btn-primary">Créer le compte</button>
        </div>
    </form>
@endsection