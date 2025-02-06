<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold text-center mb-10">Editar vacante de {{$vacante->titulo}}</h1>

                <div class="md:flex justify-center">
                    <livewire:editar-vacante :vacante="$vacante"  />
                </div>


            </div>
        </div>
    </div>





</x-app-layout>
