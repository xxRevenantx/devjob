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


            <x-button class="mt-5 text-center w">
                {{ __('Postularme') }}
            </x-button>


        </form>
    @endif




</div>
