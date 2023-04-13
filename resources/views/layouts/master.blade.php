<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }} - @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="/assets/app.js"></script>
        <link rel="stylesheet" href="/assets/app.css">

    </head>
    <body class="antialiased">
        @section('navbar')
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">SSAGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      @permission('team_pink')
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="{{ route('team-pink') }}">Team Pink</a>
                        </li>
                      @endpermission
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('clubs.index') }}">Clubs</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('events.index') }}">Events</a>
                      </li>
                      {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                      </li> --}}
                    </ul>
                    <div class="d-flex">
                      @auth
                        <a class="nav-link me-2" href="{{ route('dashboard') }}" tabindex="-1" aria-disabled="true">{{ auth()->user()->name }}</a>
                        <a class="nav-link" href="{{ route('logout') }}" tabindex="-1" aria-disabled="true">Logout</a>
                      @else
                        <a class="nav-link me-2" href="{{ route('login') }}" tabindex="-1" aria-disabled="true">Login</a>
                      @endif
                    </div>
                  </div>
            </div>
        </nav>
        @show

        <div class="content container mt-3">
            @if(session()->has('messages'))
                <div class="cell messages row">
                    <p class="cell message col rounded" id="message"><i class="fa-solid fa-x" id="close-message"></i>{{ session()->get('messages') }}</p>
                </div>
            @endif
            <div class="page-content row d-flex justify-content-center">
                @yield('content')
            </div>
        </div>
    </body>
</html>