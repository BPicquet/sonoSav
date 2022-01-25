@extends('base')

@section('content')
    <h1 class="text-center my-5">Création d'un ticket S.A.V</h1>

    <form action="{{ route('customers.store')}}" method="post">
        @csrf
        <div class="bg-light p-5 rounded-lg my-3">
            <p class="lead my-1">Informations sur le client</p>
            <hr class="mb-3">
            <div class="col">
                <div class="form-group my-3">
                    <label>Email</label>
                    <select class="form-select" name="ticket_customer_mail">
                        <option value="">Benj@gmail.com</option>
                        <option value="">admin@gmail.com</option>             
                    </select>
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
                        <input autofocus type="text" class="form-control @error('number_invoice') is-invalid @enderror" name="number_invoice" placeholder="124545">
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
                        <input type="date" class="form-control @error('purchase_date') is-invalid @enderror" name="purchase_date" placeholder="12/02/2022">
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
            
        </div>

        <div class="bg-dark p-5 rounded-lg my-3 text-white">
            <p class="lead my-1">Echange S.A.V</p>
            <hr class="mb-3">
            <div class="row d-flex">
                
            </div>
        </div>

        <div class="bg-light p-5 rounded-lg my-3">
            <p class="lead my-1">Accords préalable</p>
            <hr class="mb-3">
            <div class="col">
                <div class="form-group my-3">
                    <textarea class="form-control w-100 @error('prioor_agreement') is-invalid @enderror" name="prioor_agreement" placeholder="Veuillez renseigner les accords">
                    </textarea>
                </div>
                @error('prioor_agreement')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="bg-dark p-5 rounded-lg my-3 text-white">
            <p class="lead my-1">Tarif S.A.V</p>
            <hr class="mb-3">
            <div class="row d-flex">
                
            </div>
        </div>

        <div class="p-5 rounded-lg my-3">
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        J'approuve les règles ci-dessous pour bénéficier du S.A.V de SONOLENS.
                    </label>
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
            <button type="submit" class="btn btn-primary">Créer le ticket</button>
        </div>
    </form>
@endsection