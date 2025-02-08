<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <a href="/" class="shrink-0">
                        <h1 class="text-white text-3xl">Dev<span class="font-bold">Jobs</span></h1>
                </a>

                @auth()

                {{-- Desde la policy, si es reclutador, puede crear --}}
                @can('create', App\Models\Vacante::class)
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('vacantes.index') }}" class="{{ request()->routeIs('vacantes.index') ? 'rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white' : 'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white' }}">Vacantes</a>
                        <a href="{{ route('vacantes.create') }}" class="{{ request()->routeIs('vacantes.create') ? 'rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white' : 'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white' }}">Crear vacante</a>

                    </div>
                </div>
                @endcan



                @endauth


            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdown -->
                    <div class="ms-3 relative flex items-center">

                        @auth()

                        @can('create', App\Models\Vacante::class)

                                <a href="{{ route('notificaciones') }}"  class="mr-4 relative inline-flex items-center p-3 text-sm font-medium text-center text-white  rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" {...props} key={key}><path fill="currentColor" d="M4 8a8 8 0 1 1 16 0v4.697l2 3V20h-5.611a4.502 4.502 0 0 1-8.777 0H2v-4.303l2-3zm5.708 12a2.5 2.5 0 0 0 4.584 0zM12 2a6 6 0 0 0-6 6v5.303l-2 3V18h16v-1.697l-2-3V8a6 6 0 0 0-6-6"/></svg>

                                    <span class="sr-only">Notifications</span>
                                      <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white  {{Auth::user()->unreadNotifications->count() === 0 ?  "bg-red-500" : "bg-indigo-500" }} border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                                         {{Auth::user()->unreadNotifications->count()}}

                                        </div>
                                     </a>

                         @endcan

                         <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('vacantes.index') }}">
                                    Dashboard
                                </x-dropdown-link>


                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>

                        @else


                        <x-dropdown align="right" width="48">

                            <x-slot name="trigger">
                              <button class="text-gray-300 text-4xl">
                             <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" strokeWidth="1.5"><circle cx="12" cy="9" r="3"/><circle cx="12" cy="12" r="10"/><path strokeLinecap="round" d="M17.97 20c-.16-2.892-1.045-5-5.97-5s-5.81 2.108-5.97 5"/></g></svg>
                              </button>

                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->

                                <x-dropdown-link href="{{ route('login') }}">
                                    Iniciar Sesión
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('register') }}">
                                    Registrarse
                                </x-dropdown-link>

                            </x-slot>
                        </x-dropdown>
                        @endauth



                    </div>


                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        @auth
        @can('create', App\Models\Vacante::class)
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('vacantes.index') }}" :active="request()->routeIs('vacantes.index')">
                Vacantes
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('vacantes.create') }}" :active="request()->routeIs('vacantes.create')">
                Crear Vacante
            </x-responsive-nav-link>




            <x-responsive-nav-link  href="{{ route('notificaciones') }}" :active="request()->routeIs('notificaciones')">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" {...props} key={key}><path fill="currentColor" d="M4 8a8 8 0 1 1 16 0v4.697l2 3V20h-5.611a4.502 4.502 0 0 1-8.777 0H2v-4.303l2-3zm5.708 12a2.5 2.5 0 0 0 4.584 0zM12 2a6 6 0 0 0-6 6v5.303l-2 3V18h16v-1.697l-2-3V8a6 6 0 0 0-6-6"/></svg> --}}


                  <div class="inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white  {{Auth::user()->unreadNotifications->count() === 0 ?  "bg-red-500" : "bg-indigo-500" }} border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                     {{Auth::user()->unreadNotifications->count()}}

                    </div>
                       @choice('Notificación|Notificaciones', Auth::user()->unreadNotifications->count())
            </x-responsive-nav-link>
        </div>
        @endcan
        @endauth

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">

            @auth()
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="size-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>


                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>


                </div>


            @else


            <x-dropdown-link class="text-white" href="{{ route('login') }}">
                Iniciar Sesión
            </x-dropdown-link>
            <x-dropdown-link class="text-white" href="{{ route('register') }}">
                Registrarse
            </x-dropdown-link>


            @endauth




        </div>
    </div>
</nav>
