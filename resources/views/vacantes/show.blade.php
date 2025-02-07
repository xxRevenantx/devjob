<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vacante | {{ $vacante->titulo }} |   <span class="bg-green-700 font-bold p-1 text-white rounded-lg">{{ Auth::user()->rol === 1 ? 'Desarrollador' : 'Reclutador' }}</span>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <div>
                    <livewire:mostrar-vacante :vacante="$vacante" />
                </div>


            </div>
        </div>
    </div>





</x-app-layout>
