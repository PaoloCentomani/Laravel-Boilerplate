<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        {{-- Branding Image --}}
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>

        {{-- Collapsed Hamburger --}}
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-supported-content" aria-controls="navbar-supported-content" aria-expanded="false" aria-label="{{ __('Toggle Navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-supported-content">
            {{-- Left Side Of Navbar --}}
            <ul class="navbar-nav">
                &nbsp;
            </ul>

            {{-- Right Side Of Navbar --}}
            <ul class="navbar-nav ml-auto">
                {{-- Authentication Links --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link{{ active('login') }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ active('register') }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbar-dropdown" href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" role="button" v-pre>
                            <img class="float-left mr-2 rounded-circle gravatar" src="{{ $currentUser->gravatar }}" width="28" height="28">
                            {{ $currentUser->fullName }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-dropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
