<div>
    <h1 class="text-3xl font-bold text-center my-3">Mis vacantes</h1>


    @if (count($vacantes) > 0)
    <div class="flex justify-end">
        <a href="{{ route('vacantes.create') }}" class="bg-green-500 text-white font-bold py-2 px-4 mt-5 rounded inline-block text-center">Crear vacante</a>
    </div>

        @foreach ($vacantes as $vacante )
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="#" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                    <p>Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
            </div>

            <div class="flex flex-col md:flex-row mt-5 md:mt-0 gap-3 items-strech">
                <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white font-bold uppercase text-center">

                    CANDIDATOS
                </a>
                <a href="#" class="bg-blue-800 py-2 px-4 rounded-lg text-white font-bold uppercase text-center">
                    <svg class="w-5 h-5 inline-block text-white" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
                        <path d="M 43.125 2 C 41.878906 2 40.636719 2.488281 39.6875 3.4375 L 38.875 4.25 L 45.75 11.125 C 45.746094 11.128906 46.5625 10.3125 46.5625 10.3125 C 48.464844 8.410156 48.460938 5.335938 46.5625 3.4375 C 45.609375 2.488281 44.371094 2 43.125 2 Z M 37.34375 6.03125 C 37.117188 6.0625 36.90625 6.175781 36.75 6.34375 L 4.3125 38.8125 C 4.183594 38.929688 4.085938 39.082031 4.03125 39.25 L 2.03125 46.75 C 1.941406 47.09375 2.042969 47.457031 2.292969 47.707031 C 2.542969 47.957031 2.90625 48.058594 3.25 47.96875 L 10.75 45.96875 C 10.917969 45.914063 11.070313 45.816406 11.1875 45.6875 L 43.65625 13.25 C 44.054688 12.863281 44.058594 12.226563 43.671875 11.828125 C 43.285156 11.429688 42.648438 11.425781 42.25 11.8125 L 9.96875 44.09375 L 5.90625 40.03125 L 38.1875 7.75 C 38.488281 7.460938 38.578125 7.011719 38.410156 6.628906 C 38.242188 6.246094 37.855469 6.007813 37.4375 6.03125 C 37.40625 6.03125 37.375 6.03125 37.34375 6.03125 Z"></path>
                        </svg>
                    EDITAR
                </a>
                <a href="#" class="bg-red-600 py-2 px-4 rounded-lg text-white font-bold uppercase text-center">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block text-white" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                        <path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z"></path>
                        </svg>

                    ELIMINAR
                </a>
            </div>


         </div>
        @endforeach

    @else
    <div class="flex justify-between items-center p-4 mb-4 mt-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <span class="font-bold ">No hay vacantes creadas </span>
        <a href="{{ route('vacantes.create') }}" class="bg-green-500 text-white font-bold py-2 px-4  rounded inline-block text-center">Crear vacante</a>




      </div>
    @endif


    <div class="mt-5">
        {{ $vacantes->links() }}
    </div>




</div>
