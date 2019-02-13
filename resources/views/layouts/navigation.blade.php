<!-- ------------------ NAVIGATION MAIN PAGE ------------------ -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <style type="text/css">
      
    </style>
    <title>ODALID @yield('titre')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
    <link rel="icon" href="img/Logo4.png" />
</head>
<body>
    <div id="app">
        @section('header')
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark elegant-color-dark  scrolling-navb">
                <div class="container">
                    <a class="navbar-brand" href="http://odalid.com/fr/" target="_blank">
                        <img src="{{ asset('img/Logo2.png') }}" alt="logo" style="height:5vh; background-color: white; border-radius:15px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @guest
                        @else
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                          <li class="nav-item">
                            <a class="nav-link" href="/"><i class="fa fa-tachometer" aria-hidden="true"></i> Tableau de bord
                              <span class="sr-only">(current)</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('Utilisateurs') }}"><i class="fa fa-user" aria-hidden="true"></i> Utilisateurs</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('Badges') }}"><i class="fa fa-id-badge" aria-hidden="true"></i> Badges</a>
                          </li>
                          <!-- Dropdown -->
                          @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-building" aria-hiddénite="true"></i> Infrastructure</a>
                                    <div class="dropdown-menu dropdown elegant-color-dark" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('Zones') }}"><p class="white-text"><i class="fa fa-street-view" aria-hidden="true"></i>  Zones</p></a>
                                        <a class="dropdown-item" href="{{ route('Salles') }}"><p class="white-text"><i class="fa fa-cube" aria-hidden="true"></i>  Salles</p></a>
                                        <a class="dropdown-item" href="{{ route('Portes') }}"><p class="white-text"><i class="fa fa-columns" aria-hidden="true"></i> Portes</p></a>
                                        <a class="dropdown-item" href="{{ route('Lecteurs') }}"><p class="white-text"><i class="fa fa-rss-square" aria-hidden="true"></i> Lecteurs</p></a>
                                        <a class="dropdown-item" href="{{ route('Gaches') }}"><p class="white-text"><i class="fa fa-microchip" aria-hidden="true"></i> Gaches</p></a>
                                    </div>
                                </li>
                            @endif
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('Historique') }}"><i class="fa fa-clock-o" aria-hidden="true"></i> Historique</a>
                          </li>
                          @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
                              <!-- ---------- INSERER ICI LA PAGE DES PREFERENCES SYSTEME ----------
                              <li class="nav-item">
                                <a class="nav-link" href="" ><i class="fa fa-cog" aria-hidden="true"></i> Systeme</a>
                              </li>
                              ---------- INSERER ICI LA PAGE DES PREFERENCES SYSTEME ----------  -->
                            @endif
                        </ul>
                        @endguest
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right elegant-color-dark" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <p class="white-text"> <i class="fa fa-power-off" aria-hidden="true"></i> {{ __('Logout') }}</p>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @show

        <main class="py-0">
          <div class="mask">
            @yield('content')
          </div>
        </main>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/mdb.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
