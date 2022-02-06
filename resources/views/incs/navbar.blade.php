<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('articles') }}">Saturnin blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('articles') }}">Accueil</a>
                </li>
            </ul>
            <div class="d-flex">
                @if(Auth::user())
                    @if(Auth::user()->role == "ADMIN")
                        <a class="btn btn-outline-success" href="{{ route('admin.index')}}">Espace Admin</a>
                    @endif
                @endif
                @if (Auth::user())
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="btn btn-outline-success" type="submit">Déconnexion</button>
                    </form>
                @else
                    <a class="btn btn-outline-success" href="/login">Me connecter</a>
                @endif
            </div>
        </div>
    </div>
</nav>
