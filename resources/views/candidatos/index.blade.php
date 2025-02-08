<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Canditados Vacante
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl text-gray-800 font-bold text-center">Candidatos Vacante: {{$vacante->titulo}}</h1>
                    <ul class="divide-y divide-gray-200">
                        @forelse ($vacante->candidatos as $candidato)

                            <li class="p-4 bg-gray-100 flex justify-between items-center">
                                <div>

                                <p><span class="font-bold">Nombre:</span> {{$candidato->user->name}}</p>
                                <p><span class="font-bold">Email:</span> {{$candidato->user->email}}</p>
                                <p><span class="font-bold">Fecha de postulación:</span> {{$candidato->created_at->diffForHumans() }}</p>

                            </div>
                               <div>
                                 <a rel="noreferrer noopener" target="_blank" href="/storage/{{$candidato->cv}}" class="inline-flex intems-center shadow-sm px-2 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-lg text-white bg-indigo-700 hover:bg-indigo-800" >
                                    Ver CV</a>
                                 </div>
                            </li>

                        @empty
                            <li class="p-4 bg-gray-100">
                                <p class="font-bold">No hay candidatos</p>
                            </li>
                        @endforelse

                    </ul>

                    {{-- <div class="mt-3">
                        {{$candidatos->links()}}
                    </div> --}}

                </div>



        </div>
    </div>

    <div>
    </div>



</x-app-layout>
