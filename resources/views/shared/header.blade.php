<nav class="py-4 text-white bg-gray-800">
    <div class="container mx-auto flex flex-wrap items-center justify-between">
        {{-- Branding Image --}}
        <a class="navbar-brand flex items-center text-white" href="{{ route('home') }}" rel="home">
            <svg class="h-8" viewBox="0 0 148 50" xmlns="http://www.w3.org/2000/svg"><title>{{ config('app.name') }}</title><g class="fill-current" fill-rule="evenodd"><path d="M11.202 35.885l5.412-5.46H27.61l4.216 14.931-20.623-9.471zM3.63 16.947l10.055 1.29v10.756c0 .105.012.207.033.305l-4.788 4.83-5.3-17.181zm10.055-1.597l-9.017-1.157 9.017-9.096V15.35zm19.813-7.055l-8.344 8.529-8.63-1.109V3.654l16.974 4.641zM16.523 27.561v-8.959l8.04 1.033L26.8 27.56H16.523zm23.7 0h-10.47l-2.49-8.816 8.308-8.493 4.652 17.309zm-5.926 16.093L30.56 30.425h9.31l-5.574 13.229zm9.152-15.035L37.696 7.21a1.427 1.427 0 0 0-.999-1.008L15.475.4a1.408 1.408 0 0 0-1.234.245c-.024.017-.044.038-.066.057L14.1.626.613 14.232l.001.001c-.03.03-.059.059-.086.091-.31.374-.411.88-.267 1.346l6.402 20.752c.121.39.4.709.767.878l26.013 11.947a1.406 1.406 0 0 0 1.514-.218c.169-.146.295-.328.378-.527l.003.002 7.844-18.613c.008-.01.017-.018.024-.028.269-.354.358-.814.243-1.244zM66.64 20.482l-2.352 6.548h4.705l-2.353-6.548zm4.162 11.979l-.928-2.579h-6.468l-.95 2.579H58.79l5.836-15.22h4.026l5.813 15.22h-3.664zM83.423 24.863c0-4.678 3.506-7.872 8.03-7.872 3.324 0 5.246 1.825 6.31 3.719l-2.76 1.369c-.633-1.232-1.99-2.213-3.55-2.213-2.738 0-4.728 2.122-4.728 4.997 0 2.874 1.99 4.996 4.727 4.996 1.56 0 2.918-.958 3.55-2.213l2.76 1.346c-1.085 1.894-2.985 3.743-6.31 3.743-4.523 0-8.03-3.195-8.03-7.872M121.851 32.46V21.805L117.6 32.46h-1.402l-4.253-10.655V32.46h-3.212V17.242h4.502l3.664 9.195 3.664-9.195h4.524V32.46zM137.118 32.46V17.242h10.677v2.852h-7.465v3.217h7.306v2.852h-7.306v3.445h7.465v2.852z"/></g></svg>
        </a>

        {{-- Collapsed Hamburger --}}
        <div class="navbar-toggler block sm:hidden">
            <button class="flex items-center -mr-2 p-2 text-gray-400 hover:text-gray-300 focus:text-gray-200 focus:bg-gray-700 focus:outline-none rounded" aria-controls="navbar-supported-content" aria-label="{{ __('Toggle Navigation') }}" :aria-expanded="isNavOpen ? 'true' : 'false'" @click="isNavOpen = ! isNavOpen">
                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>{{ __('Toggle Navigation') }}</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
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
                    <drop-down label="navbar-dropdown" align="right" class="nav-item block sm:inline-block mt-4 sm:mt-0">
                        <template v-slot:toggle>
                            <img class="float-left mr-2 rounded-circle gravatar" src="{{ $currentUser->gravatar }}" width="28" height="28">
                            {{ $currentUser->fullName }}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="ml-2 h-3 fill-current"><path d="M21 11.109c0-1.329-1.481-2.122-2.587-1.385L12 14 5.587 9.725C4.481 8.988 3 9.78 3 11.109c0 .556.278 1.076.741 1.385l7.15 4.766a2 2 0 0 0 2.219 0l7.15-4.766c.462-.309.74-.828.74-1.385z"/></svg>
                        </template>

                        <div v-cloak>
                            <span class="dropdown-item text-muted">
                                {{ config('app.name') }}
                            </span>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </drop-down>

                    <form method="POST" action="{{ route('logout') }}" class="hidden" id="logout-form">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
</nav>
