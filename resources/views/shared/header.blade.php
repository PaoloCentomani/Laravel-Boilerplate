<nav id="navbar" class="mb-8 py-4 text-white bg-gray-800">
    <div class="container mx-auto flex flex-wrap items-center justify-between">
        {{-- Branding Image --}}
        <a class="navbar-brand flex items-center text-white" href="{{ route('home') }}" rel="home">
            @svg('logo', config('app.name'), 'w-24 h-8')
        </a>

        {{-- Collapsed Hamburger --}}
        <div class="navbar-toggler block sm:hidden">
            <button class="flex items-center -mr-2 p-2 text-gray-400 hover:text-gray-300 focus:text-gray-200 focus:bg-gray-700 focus:outline-none rounded" aria-controls="navbar-supported-content" aria-label="{{ __('Toggle Navigation') }}" :aria-expanded="isNavOpen ? 'true' : 'false'" @click="isNavOpen = ! isNavOpen">
                @svg('menu', __('Toggle Navigation'), 'w-4 h-4 fill-current')
            </button>
        </div>

        <div id="navbar-supported-content" class="navbar-collapse sm:flex sm:flex-grow sm:items-center w-full sm:w-auto mt-4 sm:mt-0" :class="isNavOpen ? 'block' : 'hidden'" v-cloak>
            {{-- Left Side Of Navbar --}}
            <ul class="navbar-nav text-sm text-left sm:flex-auto sm:ml-12">
                @can('view backend')
                <li class="nav-item{{ active('backend.home') }}">
                    <a class="nav-link" href="{{ route('backend.home') }}">
                        {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item{{ active('backend.users.*') }}">
                    <a class="nav-link" href="{{ route('backend.users.index') }}">
                        {{ ucfirst(trans('messages.users.plural')) }}
                    </a>
                </li>
                @endcan
            </ul>

            {{-- Right Side Of Navbar --}}
            <ul class="navbar-nav text-sm text-left sm:text-right">
                {{-- Authentication Links --}}
                @guest
                <li class="nav-item">
                    <a class="nav-link{{ active('login') }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item -mr-4">
                    <a class="nav-link{{ active('register') }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @else
                    <v-dropdown id="navbar-dropdown" align="right" class="nav-item block sm:inline-block mt-4 sm:mt-0">
                        <template v-slot:toggle>
                            <img class="mr-2 rounded-circle gravatar" src="{{ $currentUser->gravatar }}" width="28" height="28">
                            {{ $currentUser->full_name }}
                            @svg('dropdown', __('Toggle Menu'), 'w-3 h-3 ml-2 fill-current')
                        </template>

                        <div v-cloak>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </v-dropdown>

                    <form method="POST" action="{{ route('logout') }}" class="hidden" id="logout-form">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>
