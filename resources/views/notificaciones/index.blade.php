<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notificaciones
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold text-center mb-10">MIS NOTIFICACIONES</h1>

                @forelse ($notificaciones as $notificacion )
                    <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center rounded-lg ">

                        <div>
                            <p>Tienes un nuevo candidato en:

                                <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                            </p>

                            <p>
                                <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                            </p>
                        </div>



                        <div>
                            <a href="{{ route('vacantes.show', $notificacion->data['id_vacante']) }}"
                                class="bg-indigo-500 text-white font-bold py-2 px-4  inline-block rounded-lg">VER CANDIDATOS</a>

                        </div>
                    </div>




                @empty
                    <h1 class="text-2xl font-bold text-center">No tienes notificaciones</h1>
                @endforelse


            </div>
        </div>
    </div>





</x-app-layout>
