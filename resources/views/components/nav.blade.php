<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Product CRUD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
            <form method="" onclick="checkDetails(event)" class="d-flex" role="search">
                @csrf
                <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
                <button id="search" class="btn btn-outline-success" type="submit">Search</button>
            </form>
      </div>
      <div>
        @auth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link disabled" aria-current="page" href="">Welcome {{auth()->user()->name}}</a>
                </li>
                <li class="nav-item">
                    <form action="/login/logout" method="POST">
                        @csrf
                        <button class="nav-link btn" style="background-color:transparent" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        @else
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="register/view">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Login</a>
                </li>
            </ul>
        @endauth
    </div>
    </div>
    <script>

    </script>
  </nav>