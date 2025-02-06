<div  class="md:w-1/2" >



<div >

    <form  wire:submit.prevent="save" class="space-y-5" enctype="multipart/form-data">

            <div>
            <x-label for="titulo">Título de la vacante
            </x-label>
                <x-input type="text"  wire:model.live.debounce.500ms="titulo" placeholder="Título Vacante" class="block mt-1 w-full" />

            @error('titulo')
                <x-alert  color="red" >{{ $message }}</x-alert>
            @enderror

            </div>

            <div>
            <x-label for="salario">Salario Mensual</x-label>
                <x-select  wire:model.live.debounce.500ms="salario" class="block mt-1 w-full">
                    <option value="0">-- Seleccione --</option>
                    @foreach ($salarios as $salario )
                        <option value="{{ $salario->id }}">{{ $salario->salario }}</option>

                    @endforeach
                </x-select>
                @error('salario')


            @enderror
            </div>

            <div>
                <x-label for="categoria">Categoría</x-label>
                <x-select wire:model.live.debounce.500ms="categoria" name="categoria" class="block mt-1 w-full">
                    <option value="0">-- Seleccione --</option>
                    @foreach ($categorias as $categoria )
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>

                    @endforeach
                </x-select>
                    @error('categoria')
                              <x-alert  color="red" >{{ $message }}</x-alert>

                    @enderror
            </div>

            <div>
                <x-label for="empresa">Nombre de la Empresa</x-label>
                <x-input type="text" wire:model.live.debounce.500ms="empresa" name="empresa" placeholder="Nombre de la Empresa" class="block mt-1 w-full" />
                @error('empresa')
                <x-alert  color="red" >{{ $message }}</x-alert>
                @enderror
            </div>

            <div>
                <x-label for="ultimo_dia">Último Día para Postularse</x-label>
                <x-input type="date" wire:model.live.debounce.500ms="ultimo_dia" name="ultimo_dia" class="block mt-1 w-full"  />
                @error('ultimo_dia')
                          <x-alert  color="red" >{{ $message }}</x-alert>

                @enderror
            </div>


            <div>
                <x-label for="descripcion">Descripción del Puesto</x-label>
                <textarea  wire:model.live.debounce.500ms="descripcion" placeholder="Descripción del Puesto" class="block mt-1 w-full"></textarea>

                @error('descripcion')
                          <x-alert  color="red" >{{ $message }}</x-alert>

                @enderror
            </div>


            <div>
                <x-label for="imagen">Imagen de la Vacante</x-label>



                <div class="custom-file">
                    <input type="file" wire:model="imagen" accept="image/*" name="imagen"  class="custom-file-input" id="customFileLang" lang="es">
                </div>
                 @error('imagen')
                     <x-alert  color="red" >{{ $message }}</x-alert>

                @enderror
            </div>


            <x-alert color="green" class="w-full" wire:loading wire:target="imagen" >Cargando...</x-alert>
            @if ($imagen)
            <img src="{{ $imagen->temporaryUrl() }}" alt="Vista previa" style="max-width: 300px;">
            @endif
            <div>
                <x-button>Crear Vacante</x-button>
            </div>

    </form>

    </div>
    </div>
