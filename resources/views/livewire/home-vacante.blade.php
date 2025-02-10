<div>
    <livewire:filtrar-vacantes />


  <div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
     <h3 class="font-extrabold text-4xl text-gray-700 mb-12">Nuestras vacantes disponibles</h3>
     <div class="text-center text-2xl  m-auto w-full text-white" wire:loading>
        <svg class="w-20 m-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle fill="#6366F1" stroke="#6366F1" stroke-width="15" r="15" cx="40" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate></circle><circle fill="#6366F1" stroke="#6366F1" stroke-width="15" r="15" cx="100" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate></circle><circle fill="#6366F1" stroke="#6366F1" stroke-width="15" r="15" cx="160" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate></circle></svg>
      </div>
        <div class="bg-white shadow-sm rounded-sm p-6 divide-y divide-gray-200">
            @forelse ($vacantes as $vacante)
                <div class="md:flex md:justify-between md:items-center py-5">
                    <div class="md:flex-1">
                        <a class="text-3xl font-extrabold text-gray-600" href="{{route('vacantes.show', $vacante)}}">{{$vacante->titulo}}</a>
                        <p class="text-base text-gray-600 mb-1">{{$vacante->categoria->categoria}}</p>
                        <p class="text-base text-gray-600 mb-1">{{$vacante->salario->salario}}</p>
                        <p class="text-base text-gray-600 mb-1">{{$vacante->empresa}}</p>
                        <p class="font-bold text-xs text-gray-600" >último día para postularse <span class="font-normal">{{$vacante->ultimo_dia->format('d-m-Y')}}</span></p>
                    </div>

                    <div class="mt-5 md:mt-0">
                        <a  class="bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg block" href="{{route('vacantes.show', $vacante)}}">Ver vacante</a>
                    </div>
                </div>
            @empty
            <p class="p-3 alert bg-indigo-300">No hay vacantes</p>

            @endforelse
     </div>

    </div>

  </div>
</div>
