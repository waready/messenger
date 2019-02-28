<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

</head>
<body>
    <div id="app">
      <b-navbar toggleable="md" type="dark" variant="primary">
        <b-navbar-toggle target="nav_collapse">
            Menu
        </b-navbar-toggle>
            <b-navbar-brand href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
            </b-navbar-brand>

            <b-collapse is-nav id="nav_collapse">
            <!-- Right aligned nav items -->

            <b-collapse is-nav id="nav_text_collapse">
                <b-navbar-nav class="ml-auto">
                    <b-navbar-nav class="ml-auto">     
                        <b-nav-item-dropdown text="Idiomas" right>
                            <b-dropdown-item href="#">EN</b-dropdown-item>
                            <b-dropdown-item href="#">ES</b-dropdown-item>
                            <b-dropdown-item href="#">RU</b-dropdown-item>
                            <b-dropdown-item href="#">FA</b-dropdown-item>
                        </b-nav-item-dropdown>
                    </b-navbar-nav>
                    @guest
                        <b-nav-item  href="{{ route('login') }}"> 
                            Login
                        </b-nav-item>
                        <b-nav-item  href="{{ route('register') }}"> 
                            Register
                        </b-nav-item>
                    @else
                        <b-nav-item-dropdown text="Username" right>
                            <b-dropdown-item href="#">
                                Cerrar Sesion
                            </b-dropdown-item>
                        </b-nav-item-dropdown>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </b-navbar-nav>
            </b-collapse>
        </b-collapse>
    </b-navbar>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
