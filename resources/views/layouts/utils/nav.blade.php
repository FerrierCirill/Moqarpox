<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper container">
        <a href="{{ route('main') }}" class="brand-logo">Mouqarpox</a>
        <ul class="right hide-on-med-and-down">
            <li>
                <a href="{{route('get_add_comment')}}">Déposer un avis</a>
            </li>
            <li>
                <a href="{{route('shopping_cart')}}"><i class="fas fa-shopping-cart"></i></a>
            </li>
            @isAdmin
                <li>
                    <a href="{{route('admin')}}"><i class="fas fa-user-lock"></i></a>
                </li>
            @endisAdmin

            @isLog
                <li>
                    <a href="{{route('user_details')}}"><i class="fas fa-user"></i></a>
                </li>
            @endisLog


            @guest
                <li>
                    <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                    </li>
                @endif
            @else
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


            @endguest



        </ul>
        </div>
    </nav>
</div>
