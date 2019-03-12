<nav id="navbar" class="navbar">
    <a class="navbar-brand" href="{{ route('welcome') }}">
        <img src="/images/logo/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        AnalyticsVR
    </a>

    {{-- Navbar izquierda --}}
    <ul class="navbar-nav mr-auto nav-row">

    </ul>

    {{-- Navbar derecha --}}
    <ul class="navbar-nav ml-auto nav-row">

        <!-- Authentication Links -->
        @guest
        <li class="nav-item px-2">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
        </li>
        <li class="nav-item px-2">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
        </li>

        @else

        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>
</nav>
