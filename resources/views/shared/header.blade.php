<nav class="py-4 text-white bg-gray-800">
    <div class="container mx-auto flex flex-wrap items-center justify-between">
        {{-- Branding Image --}}
        <a class="navbar-brand flex items-center text-white" href="{{ route('home') }}" rel="home">
            @svg('logo', 'h-8', config('app.name'))
        </a>

        {{-- Collapsed Hamburger --}}
        <div class="navbar-toggler block sm:hidden">
            <button class="flex items-center -mr-2 p-2 text-gray-400 hover:text-gray-300 focus:text-gray-200 focus:bg-gray-700 focus:outline-none rounded" aria-controls="navbar-supported-content" aria-label="{{ __('Toggle Navigation') }}" :aria-expanded="isNavOpen ? 'true' : 'false'" @click="isNavOpen = ! isNavOpen">
                @svg('menu', 'h-4 fill-current', __('Toggle Navigation'))
            </button>
        </div>

        <div id="navbar-supported-content" class="navbar-collapse sm:flex sm:flex-grow sm:items-center w-full sm:w-auto mt-4 sm:mt-0" :class="isNavOpen ? 'block' : 'hidden'" v-cloak>
            {{-- Left Side Of Navbar --}}
            <ul class="navbar-nav text-left sm:ml-12 text-sm"></ul>

            {{-- Right Side Of Navbar --}}
            <ul class="navbar-nav text-left sm:text-right text-sm sm:flex-grow">
                {{-- Authentication Links --}}
                @guest
                    <li class="nav-item block sm:inline-block mt-4 sm:mt-0 sm:mr-4">
                        <a class="nav-link text-gray-500 hover:text-white{{ active('login') }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item block sm:inline-block mt-4 sm:mt-0 sm:mr-4">
                        <a class="nav-link text-gray-500 hover:text-white{{ active('register') }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <v-dropdown label="navbar-dropdown" align="right" class="nav-item block sm:inline-block mt-4 sm:mt-0">
                        <template v-slot:toggle>
                            <img class="float-left mr-2 rounded-circle gravatar" src="{{ $currentUser->gravatar }}" width="28" height="28">
                            {{ $currentUser->fullName }}
                            @svg('dropdown', 'h-3 ml-2 fill-current', __('Toggle Menu'))
                        </template>

                        <div v-cloak>
                            @can('view backend')
                            <a class="dropdown-item" href="{{ route('admin.home') }}">
                                {{ __('Administrator') }}
                            </a>
                            @else
                            <span class="dropdown-item text-muted">
                                {{ config('app.name') }}
                            </span>
                            @endcan

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
</nav>
