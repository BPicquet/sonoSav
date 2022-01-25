@extends('base')

@section('content')
    <div style="height: 75vh;" class="d-flex justify-content-center align-items-center">
        @if(Auth::user())
            <h1 class="typewriter-text">Bienvenue {{ Auth::user()->name }}</h1>
        @else
            <h1 class="typewriter-text2">Bienvenue sur le logiciel S.A.V</h1>
        @endif
    </div>
@endsection