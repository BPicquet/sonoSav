@extends('base')

@section('content')
    <h1 class="text-center my-5">Modification du ticket S.A.V {{ $ticket->id }} de {{ $ticket->customerTicket->name }} {{ $ticket->customerTicket->first_name }}</h1>

    <form action="{{ route('tickets.update', $ticket->id)}}" method="post">
        @csrf
        @method('put')

        <div class="bg-light p-5 rounded-lg my-3">
            <p class="lead my-1">Ticket</p>
            <hr class="mb-3">
            <div class="col">
                <div class="form-group my-3">
                    <label>Etat du ticket</label>
                    <select class="form-select" name="state_id">
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ $state->id === $ticket->stateTicket->id ? 'selected' : '' }}>{{ $state->name }}</option>
                        @endforeach                
                    </select>
                </div>
                <div>
                    <p class="text-center text-warning">Vous pouvez changer à tout moment l'état du ticket</p>
                </div>
            </div>
        </div>
        
        <div class="bg-dark p-5 rounded-lg my-3 text-white">
            <p class="lead my-1">Informations ventes</p>
            <hr class="mb-3">
            <div class="row d-flex">
                <div class="col">
                    <div class="form-group my-3">
                        <label>N° de facture</label>
                        <input type="text" class="form-control @error('number_invoice') is-invalid @enderror" name="number_invoice" placeholder="124545" value="{{ $ticket->number_invoice }}">
                    </div>
                    @error('number_invoice')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <div class="form-group my-3">
                        <label>Date d'achat</label>
                        <input type="date" class="form-control @error('purchase_date') is-invalid @enderror" name="purchase_date" placeholder="12/02/2022" value="{{ $ticket->purchase_date }}">
                    </div>
                    @error('purchase_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="bg-light p-5 rounded-lg my-3">
            <p class="lead my-1">Identification du matériel</p>
            <hr class="mb-3">
            <div class="row d-flex">
                <div class="col">
                    <div class="form-group my-3">
                        <label>Catégorie</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" placeholder="Contrôleur" value="{{ $ticket->category }}"">
                    </div>
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <div class="form-group my-3">
                        <label>Marque</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" placeholder="Pioneer" value="{{ $ticket->brand }}">
                    </div>
                    @error('brand')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <div class="form-group my-3">
                        <label>Modèle</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" name="model" placeholder="XDJ-RX3" value="{{ $ticket->model }}">
                    </div>
                    @error('model')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group my-3">
                    <label>N° de série</label>
                    <input type="text" class="form-control @error('serial_number') is-invalid @enderror" name="serial_number" placeholder="45372814" value="{{ $ticket->serial_number }}">
                </div>
                @error('serial_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="form-group my-3 text-dark">
                    <label>Panne constaté</label>
                    <textarea class="form-control w-100 @error('breakdown') is-invalid @enderror" name="breakdown" placeholder="Veuillez renseigner la panne constaté">
                        {{ $ticket->breakdown }}
                    </textarea>
                </div>
                @error('breakdown')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="bg-dark p-5 rounded-lg my-3 text-white">
            <p class="lead my-1">Echange S.A.V</p>
            <hr class="mb-3">
            <div class="row d-flex">
                <div class="col">
                    <div class="form-group my-3">
                        <label>Type d'échange</label>
                        <input type="text" class="form-control @error('exchange_type') is-invalid @enderror" name="exchange_type" placeholder="Prêt" value="{{ $ticket->exchange_type}}">
                    </div>
                    @error('exchange_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <div class="form-group my-3">
                        <label>N° de bon</label>
                        <input type="text" class="form-control @error('exchange_number') is-invalid @enderror" name="exchange_number" placeholder="45658" value="{{ $ticket->exchange_number_ticket }}">
                    </div>
                    @error('exchange_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="bg-light p-5 rounded-lg my-3">
            <p class="lead my-1">Accords préalable</p>
            <hr class="mb-3">
            <div class="col">
                <div class="form-group my-3">
                    <textarea class="form-control w-100 text-dark @error('prior_agreement') is-invalid @enderror" name="prior_agreement">
                        {{ $ticket->prior_agreement}}
                    </textarea>
                </div>
                @error('prior_agreement')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="bg-dark p-5 rounded-lg my-3 text-white">
            <p class="lead my-1">Tarif S.A.V</p>
            <hr class="mb-3">
            <div class="row">
                <div class="form-group my-3">
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Garantie" value="{{ $ticket->price }}">
                </div>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="p-5 rounded-lg my-3">
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ 'checked' ? 0 : 'null' }}" id="flexCheckDefault" name="rules_checkbox" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        J'approuve les règles ci-dessous pour bénéficier du S.A.V de SONOLENS.
                    </label>
                    @error('rules_checkbox')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <ul>
                    <li>Tout S.A.V ne sera pas repris sans pièces d'identité. </li>
                    <li>Tout S.A.V stocké plus d'un mois dans nos locaux sera vendu. </li>
                    <li>Pour bénéficier de la garantie S.A.V, la facture d'achat est obligatoire. Toute machine étant ouverte, touché, ou mal remonté sera refusé.</li>
                    <li>Tous les produits bénéficient de la garantie fabricant.</li>
                    <li>La responsabilité de la Société ne sera pas engagé en cas de retard dû à une rupture de stock chez le fournisseur.</li>
                    <li>Toute garantie est exclue en cas de mauvaise utilisation, négligence ou mauvaise entretien de la part du client.</li>
                    <li>La S.A.V est également exclue en cas d'environnement non conforme aux données constructeurs.</li>
                </ul>
            </div>
        </div>


        <div class="d-flex align-items-center justify-content-center my-5">
            <button type="submit" class="btn btn-warning">Modifier le ticket</button>
        </div>
    </form>
@endsection