<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Videos</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
        <a class="navbar-brand" href="{{ url('/') }}">IngSwII</a>

          <div class="navbar navbar-light bg-light links">

              <!-- Authentication Links -->
              @guest
                <form class="form-inline">
                  <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">BUSCAR</button>
                </form>
                <a class="" href="{{ route('login') }}">INGRESAR</a>

              @if (Route::has('register'))
                  <a class="" href="{{ route('register') }}">REGISTRO</a>
              @endif
                @else
                  <a class="" href="{{ url('/home') }}">VIDEOS</a>
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">BUSCAR</button>
                    </form>
                        <a id="navbarDropdown" class="links dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                @endguest
            </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


      </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
