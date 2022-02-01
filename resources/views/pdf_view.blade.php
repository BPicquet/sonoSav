<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet">
    <title>SAV{{ $ticket->id }}_{{ $ticket->customerTicket->name }}-{{ $ticket->customerTicket->first_name }}</title>
</head>
<body>
    <header>
        <img src="{{ public_path('imgs/sonolens_logo.png') }}" alt="">
        <h1>SAV N°{{ $ticket->id }}: {{ $ticket->customerTicket->name }} {{ $ticket->customerTicket->first_name }}</h1>
    </header>

    <div class="container-div">
        <span>Date du:</span>
        <span class="p2">{{ $ticket->dateFormated() }}</span>
    </div>

    <div class="container-div">
        <span>Pris en charge par:</span>
        <span class="p2">{{ $ticket->userTicket->name }}</span>
    </div>

    <div class="container-div">
        <span>Tarif S.A.V:</span>
        <span class="p2">{{ $ticket->price }}</span>
    </div>

    <hr>

    <section class="customer_informations">
        <h2>Informations du client</h2>
        <div class="container-div">
            <span>Nom:</span>
            <span class="p2">{{ $ticket->customerTicket->name }}-{{ $ticket->customerTicket->first_name }}</span>
        </div>
    
        <div class="container-div">
            <span>Téléphone</span>
            <span class="p2">{{ $ticket->customerTicket->phone }}</span>
        </div>

        <div class="container-div">
            <span>Mail</span>
            <span class="p2">{{ $ticket->customerTicket->mail }}</span>
        </div>
    </section>

    <section class="sales_informations">
        <h2>Informations de ventes</h2>
        <div class="container-div">
            <span>Date d'achat:</span>
            <span class="p2">{{ $ticket->purchase_date }}</span>
        </div>
    
        <div class="container-div">
            <span>N° de facture:</span>
            <span class="p2">{{ $ticket->number_invoice }}</span>
        </div>
    </section>

    <section class="product_breakdown">
        <h2>Identification du produit</h2>
        <div class="container-div">
            <span>Type:</span>
            <span class="p2">{{ $ticket->type }}</span>
        </div>
    
        <div class="container-div">
            <span>Marque:</span>
            <span class="p2">{{ $ticket->brand }}</span>
        </div>

        <div class="container-div">
            <span>Marque:</span>
            <span class="p2">{{ $ticket->model }}</span>
        </div>

        <div class="container-div">
            <span>Modèle:</span>
            <span class="p2">{{ $ticket->brand }}</span>
        </div>

        <div class="container-div">
            <span>N° de série:</span>
            <span class="p2">{{ $ticket->serial_number}}</span>
        </div>

        <div class="container-div">
            <span>Panne constatée:</span>
            <span class="p2">{{ $ticket->breakdown }}</span>
        </div>
    </section>

    <section class="exchanges_sav">
        <h2>Echange S.A.V</h2>
        <div class="container-div">
            <span>Prêt/location:</span>
            <span class="p2">{{ $ticket->exchange_type }}</span>
        </div>
    
        <div class="container-div">
            <span>N° de bon:</span>
            <span class="p2">{{ $ticket->exchange_number_ticket }}</span>
        </div>
    </section>

    <p class="rules_agreement">
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

</body>
</html>

