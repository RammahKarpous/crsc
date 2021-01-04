<nav class="nav">
    <div class="wrapper px-20">
        <a class="navbar-brand" href="{{ url('/') }}">
            LOGO
        </a>

        <ul class="nav__list">
            <li class="nav__item"><a class="nav__link" href="{{ route('meets.index') }}">Meets</a></li>

            @guest
                <li class="nav__item"><a class="nav__link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @else
                @if (Auth::user()->member_type_id === 3)
                    <li class="nav__item"><a class="nav__link" href="{{ route('family-group.index') }}">Family groups</a></li>
                @endif

                <li class="nav__item">
                    <a id="navbarDropdown" class="nav__link" href="{{ route('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Dashboard
                    </a>
                </li>

                <li class="nav__item">
                    <div aria-labelledby="navbarDropdown">
                        <a class="nav__link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>