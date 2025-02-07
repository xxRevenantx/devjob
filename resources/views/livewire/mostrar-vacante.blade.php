<div class="p-4">
    <div class="p-4 mb-4 text-sm text-green-900 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <h1 class="text-3xl font-bold text-center">Vacante | {{ $vacante->titulo }}</h1>
    </div>

  <div class="md:grid md:grid-cols-2 md:gap-1 bg-gray-100 p-4">
    <p class="font-bold text-sm uppercase text-gray-800 my-2">Empresa:
        <span class="font-normal">{{ $vacante->empresa }}</span>
    </p>
    <p class="font-bold text-sm uppercase text-gray-800 my-2">Último día para postularse:
        <span class="font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
    </p>
    <p class="font-bold text-sm uppercase text-gray-800 my-2">Categoría:
        <span class="font-normal">{{ $vacante->categoria->categoria}}</span>
    </p>
    <p class="font-bold text-sm uppercase text-gray-800 my-2">Salario:
        <span class="font-normal">{{ $vacante->salario->salario }}</span>
    </p>
  </div>

  <div class="md:grid md:grid-cols-6 my-4">


  <div class="md:col-span-2">
    <img src="{{ asset('storage/vacantes/'.$vacante->imagen) }}" alt="{{ $vacante->titulo }}" style="max-width: 300px;">
  </div>

  <div class="md:col-span-4">
    <h2 class="text-2xl text-gray-800 mt-10 font-bold">Descripción del Puesto:</h2>
    <div class="text-gray-700 mt-2">
        {!! $vacante->descripcion !!}
    </div>
  </div>
</div>

{{-- Con guest mostramos el contenido al invitado más no al que está registrado --}}
@guest
<div class="mt-5 bg-gray-100 border- border-dashed p-5 text-center">
    <p>¿Deseas aplicar a esta vacante? <a class="font-bold text-indigo-500" href="{{ route('register') }}">
        Obtén una cuenta y aplica a esta vacante y a otras vacantes</a></p>
</div>
@endguest


</div>
