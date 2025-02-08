<div class="bg-gray-100 p-5 p-5 mt-10 flex flex-col justify-center items-center">

    @if (session()->has('message'))
        <x-alert-success color="green">{{ session('message') }}</x-alert-success>

    @else
    <h3 class="text-2xl font-bold text-center">Postularme a la vacante</h1>

        <form class="mt-5" wire:submit.prevent="postularme" enctype="multipart/form-data">
            <div class="mb-4 flex justify-center flex-col">
                <x-label for="PDF" class="text-center" :value="__('Curriculum u Hoja de Vida (PDF)')" />
                <x-input id="cv" wire:model="cv" class="block mt-1 w-full" accept=".pdf" type="file" name="cv" />
            </div>


            @error('cv')
            <x-alertd>{{ $message }}</x-alertd>

             @enderror


             <div class="flex justify-center items-center">

                <x-button class="text-center w">
                    {{ __('Postularme') }}
                </x-button>

                <div wire:loading class="w-10 h-10 text-center">
                    {{-- <svg  class="w-10 h-10 text-center" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><radialGradient id="a12" cx=".66" fx=".66" cy=".3125" fy=".3125" gradientTransform="scale(1.5)"><stop offset="0" stop-color="#1F2937"></stop><stop offset=".3" stop-color="#1F2937" stop-opacity=".9"></stop><stop offset=".6" stop-color="#1F2937" stop-opacity=".6"></stop><stop offset=".8" stop-color="#1F2937" stop-opacity=".3"></stop><stop offset="1" stop-color="#1F2937" stop-opacity="0"></stop></radialGradient><circle transform-origin="center" fill="none" stroke="url(#a12)" stroke-width="15" stroke-linecap="round" stroke-dasharray="200 1000" stroke-dashoffset="0" cx="100" cy="100" r="70"><animateTransform type="rotate" attributeName="transform" calcMode="spline" dur="2" values="360;0" keyTimes="0;1" keySplines="0 0 1 1" repeatCount="indefinite"></animateTransform></circle><circle transform-origin="center" fill="none" opacity=".2" stroke="#1F2937" stroke-width="15" stroke-linecap="round" cx="100" cy="100" r="70"></circle></svg> --}}
                    <svg  class="w-10 h-10 text-center" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 150"><path fill="none" stroke="#1F2937" stroke-width="15" stroke-linecap="round" stroke-dasharray="300 385" stroke-dashoffset="0" d="M275 75c0 31-27 50-50 50-58 0-92-100-150-100-28 0-50 22-50 50s23 50 50 50c58 0 92-100 150-100 24 0 50 19 50 50Z"><animate attributeName="stroke-dashoffset" calcMode="spline" dur="2" values="685;-685" keySplines="0 0 1 1" repeatCount="indefinite"></animate></path></svg>
                </div>
            </div>

        </form>
    @endif




</div>
