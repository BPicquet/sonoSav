@extends('base')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center my-5">
        @if(Auth::user())
            <h1 class="typewriter-text my-5">Bienvenue {{ Auth::user()->name }}</h1>
            <p>
                Le logiciel est regroupé autour d'un système de ticket. Un ticket correspond à une demande S.A.V d'un client. Pour ajouter un S.A.V, vous pouvez tout simplement cliquer sur le "+" en haut à gauche.
            </p>
            <hr>
            <div class="w-100 d-flex justify-content-between my-3">
                <div class="card bg-light m-3 w-50">
                    <div class="card-header">Droit Utilisateur</div>
                    <div class="card-body">
                        <ul>
                            <li>Ajout et modification d'un ticket</li>
                            <li>Modification de l'état d'un ticket</li>
                            <li>Ajout et modification des données d'un client</li>
                            <li>Génération d'un PDF</li>
                        </ul>
                    </div>
                </div>
                <div class="card bg-primary text-white m-3 w-50">
                    <div class="card-header">Droit Admin</div>
                    <div class="card-body">
                        <ul>
                            <li>Suppression d'un client et de ses tickets</li>
                            <li>Suppression d'un ticket spécifique</li>
                            <li>Gestion des utilisateurs du logiciel</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <h2>Etat</h2>
                <p>
                    Les tickets fonctionnement avec différent états: En traitement, envoie, réparation, disponible et fini. Il convient donc à chacun de gérer ces états pour être au courant de l'état des tickets.
                    Pour modifier l'état d'un ticket, il suffit de se rendre dans "ticket", choisir son ticket, cliquer sur l'engrenage, modifier l'état et valider.
                </p>
            </div>
        @else
            <h1 class="typewriter-text2">Bienvenue sur le logiciel S.A.V</h1>
        @endif
    </div>
@endsection