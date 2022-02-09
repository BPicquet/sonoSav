<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
  @if(Auth::user())
  <a href="{{ route('tickets.create') }}">
    <i class="fas fa-plus-circle fa-2x mx-3 text-light"></i>
  </a>
  @endif
  <div class="collapse navbar-collapse d-flex justify-content-lg-between align-content-center" id="navbarNav">
      @if(Auth::user())
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Clients
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('customers.index') }}">Tous les clients</a>
            <a class="dropdown-item" href="{{ route('customers.create') }}">Ajouter un client</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tickets
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('tickets') }}">Tous</a>
            <a class="dropdown-item" href="{{ route('tickets.processing') }}">Traitement</a>
            <a class="dropdown-item" href="{{ route('tickets.sending') }}">Envoie</a>
            <a class="dropdown-item" href="{{ route('tickets.repairing') }}">Réparation</a>
            <a class="dropdown-item" href="{{ route('tickets.avalaible') }}">Disponible</a>
            <a class="dropdown-item" href="{{ route('tickets.finished') }}">Fini</a>
          </div>
        </li>
        @else
          <h2 class="text-white m-2">Sonolens</h2>
        @endif
      </ul>


      <ul class="navbar-nav d-flex align-items-center me-4">
        @if(Auth::user())
          @if(Auth::user()->role == "ADMIN")
            <a href="{{ route('users') }}" class="text-white mx-3 text-decoration-none">Espace Admin</a>
          @endif
          <li class="nav-item dropdown bg-primary rounded-2">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn">Déconnexion</button>
              </form>
            </div>
          </li>
        @else
          <li class="nav-item bg-primary rounded-2">
            <a href="/login" class="nav-link text-white">Connexion</a>
          </li>
          <li class="nav-item">
            <a href="/register" class="nav-link">Inscription</a>
          </li>
        @endif
      </ul>
    </div>
  </nav>