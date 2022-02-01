@extends('base')

@section('content')
    <div class="bg-dark my-4">
        <h3 class="text-center text-white py-2">Ticket S.A.V N°{{ $ticket->id }} - {{ $ticket->customerTicket->name }} {{ $ticket->customerTicket->first_name }}</h3>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="bg-light p-5 rounded-lg my-3">
        <p class="lead my-1">Informations de vente</p>
        <hr class="mb-3">
        <div class="d-flex">
            <p class="fw-bold">Client:&nbsp;</p>
            <p class="text-muted"><a href="{{ route('customers.show', $ticket->customerTicket->id) }}">{{ $ticket->customerTicket->name }} {{ $ticket->customerTicket->first_name }}</a></p>
        </div>
        <div class="d-flex">
            <p class="fw-bold">Date d'achat:&nbsp;</p>
            <p class="text-muted">{{ $ticket->purchase_date }}</p>
        </div>
        <div class="d-flex">
            <p class="fw-bold">N° de facture:&nbsp;</p>
            <p class="text-muted">{{ $ticket->number_invoice }}</p>
        </div>
    </div>

    <div class="bg-dark p-5 rounded-lg my-3 text-white">
        <p class="lead my-1">Identification du matériel</p>
        <hr class="mb-3">
        <div>
            <div class="d-flex flex">
                <p class="fw-bold">Type:&nbsp;</p>
                <p class="text-muted">{{ $ticket->category }}</p>
            </div>
            <div class="d-flex flex">
                <p class="fw-bold">Marque:&nbsp;</p>
                <p class="text-muted">{{ $ticket->brand }}</p>
            </div>
            <div class="d-flex flex">
                <p class="fw-bold">Modèle:&nbsp;</p>
                <p class="text-muted">{{ $ticket->model }}</p>
            </div>
            <div class="d-flex flex">
                <p class="fw-bold">Numéro de série:&nbsp;</p>
                <p class="text-muted">{{ $ticket->serial_number }}</p>
            </div>
            <div class="d-flex flex">
                <p class="fw-bold">Panne constaté:&nbsp;</p>
                <p class="text-muted">{{ $ticket->breakdown }}</p>
            </div>
        </div>
    </div>

    <div class="bg-light p-5 rounded-lg my-3">
        <p class="lead my-1">Echange S.A.V</p>
        <hr class="mb-3">
        <div class="d-flex justify-content-lg-between">
            <div class="d-flex">
                <p class="fw-bold">Prêt\Location:&nbsp;</p>
                <p class="text-muted">{{ $ticket->exchange_type }}</p>
            </div>
            <div class="d-flex">
                <p class="fw-bold">N° Bon:&nbsp;</p>
                <p class="text-muted">{{ $ticket->exchange_number_ticket }}</p>
            </div>
        </div>
    </div>

    <div class="bg-dark p-5 rounded-lg my-3 text-white">
        <p class="lead my-1">Accords préalable</p>
        <hr class="mb-3">
        <p class="text-muted">{{ $ticket->prior_agreement }}</p>
    </div>

    <div class="bg-light p-5 rounded-lg my-3">
        <p class="lead my-1">SAV</p>
        <hr class="mb-3">
        <div class="d-flex">
            <p class="fw-bold">Tarif SAV:&nbsp;</p>
            <p class="text-muted">{{ $ticket->price }}</p>
        </div>
    </div>

    <div class="bg-dark p-5 rounded-lg my-3 text-white">
        <p class="lead my-1">Informations SAV</p>
        <hr class="mb-3">
        <div>
            <div class="d-flex">
                <p class="fw-bold">Date de création:&nbsp;</p>
                <p class="text-muted">{{ $ticket->dateFormated() }}</p>
            </div>
            <div class="d-flex">
                <p class="fw-bold">Expert:&nbsp;</p>
                @if($ticket->userTicket->name)
                    <p class="text-muted">{{ $ticket->userTicket->name }}</p>
                @else
                    <p class="text-muted">Ancien employé</p>
                @endif
            </div>
            <div>
                <p class="fw-bold">Historique S.A.V:&nbsp;</p>
                <div class="w-75 ms-5">
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold">Création:&nbsp;</p>
                        <p class="text-muted">{{ $ticket->dateFormated() }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold">Traitement:&nbsp;</p>
                        <p class="text-muted">é"é"'é'</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-5 rounded-lg my-3">
        <p>
            <strong>{{ $ticket->customerTicket->name }} {{ $ticket->customerTicket->first_name }}</strong>
            approuve les règles ci-dessous lors de sa venu le <strong>{{ $ticket->dateFormated() }}</strong> pour bénéficier du S.A.V de SONOLENS.
            Tout S.A.V ne sera pas repris sans pièces d'identité. 
            Tout S.A.V stocké plus d'un mois dans nos locaux sera vendu. 
            Pour bénéficier de la garantie S.A.V, la facture d'achat est obligatoire. Toute machine étant ouverte, touché, ou mal remonté sera refusé.
            Tous les produits bénéficient de la garantie fabricant.
            La responsabilité de la Société ne sera pas engagé en cas de retard dû à une rupture de stock chez le fournisseur.
            Toute garantie est exclue en cas de mauvaise utilisation, négligence ou mauvaise entretien de la part du client.
            La S.A.V est également exclue en cas d'environnement non conforme aux données constructeurs.
        </p>
    </div>

    <div class="d-flex justify-content-between mb-5">
        <button type="button" class="btn btn-primary">Ajouter signature client</button>
        <a type="button" href="{{ route('tickets.pdf', $ticket->id) }}" class="btn btn-secondary">
            <i class="fas fa-print me-2"></i>
            Imprimer
        </a>
    </div>
@endsection