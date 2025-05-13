<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homePage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create') }}">Create Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profiles.index') }}">Tous les Profiles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('publication.index') }}">Publication </a>
                </li>
               

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('seetings.index') }}">Settings</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('login.show') }}">Se Connect</a>
                    </li>
                @endguest
              
                @auth
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('publication.create') }}">Add Publication </a>
                </li>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                           {{ auth()->user()->name}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('login.logout') }}">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                @endauth



            </ul>
        </div>
    </div>
</nav>
