<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand col-9" href="/"><img src="{{ secure_asset("image/logo.png") }}" alt="Dokushoka"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="nav justify-content-end">
          @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('items.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Add books
              </a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
                    Ranking
                <span class="caret"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('ranking.read') }}">Read Ranking</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('ranking.want') }}">Want Ranking</a>
              </div>
            </li>
                        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="gravatar">
              <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
              </span>
              {{ Auth::user()->name }}
              <span class="caret"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">My Page</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout.get') }}">Log out</a>
              </div>
            </li>
              @else
                <li class="signup"><a href="{{ route('signup.get') }}">Sign up</a></li>
                <li><a href="{{ route('login') }}">Log in</a></li>
              @endif
        </ul>
        </div>
    </nav>
</header>