@extends('base')

@section('content')
    
    <div class="d-flex justify-content-center flex-wrap">
        @foreach($users as $user)
            <div class="card mb-3 w-75 m-5">
                <div class="d-flex justify-content-between align-items-center card-header">
                    <h3 >{{ $user->name }}</h3>
                    @if(Auth::user()->id == $user->id)
                        <span class="badge rounded-pill bg-dark mx-2 px-2">Moi</span>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title my-2 text-primary">{{ $user->role }}</h5>
                    <h6 class="card-subtitle text-muted my-3">{{ $user->email }}</h6>
                </div>
            </div>
        @endforeach
    </div>
@endsection