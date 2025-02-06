<div  class="md:w-1/2" >



<div >

    <form  wire:submit.prevent="save" class="space-y-5" enctype="multipart/form-data">

            <div>
            <x-label for="titulo">Título de la vacante
            </x-label>
                <x-input type="text"  wire:model.live.debounce.500ms="titulo" placeholder="Título Vacante" class="block mt-1 w-full" />

            @error('titulo')
                <x-alertd  color="red" >{{ $message }}</x-alertd>
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
                <x-alertd  color="red" >{{ $message }}</x-alertd>

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
                           <x-alertd  color="red" >{{ $message }}</x-alertd>

                    @enderror
            </div>

            <div>
                <x-label for="empresa">Nombre de la Empresa</x-label>
                <x-input type="text" wire:model.live.debounce.500ms="empresa" name="empresa" placeholder="Nombre de la Empresa" class="block mt-1 w-full" />
                @error('empresa')
             <x-alertd  color="red" >{{ $message }}</x-alertd>
                @enderror
            </div>

            <div>
                <x-label for="ultimo_dia">Último Día para Postularse</x-label>
                <x-input type="date" wire:model.live.debounce.500ms="ultimo_dia" name="ultimo_dia" class="block mt-1 w-full"  />
                @error('ultimo_dia')
                       <x-alertd  color="red" >{{ $message }}</x-alertd>

                @enderror
            </div>


            <div>
                <x-label for="descripcion">Descripción del Puesto</x-label>
                <textarea  wire:model.live.debounce.500ms="descripcion" placeholder="Descripción del Puesto" class="block mt-1 w-full"></textarea>

                @error('descripcion')
                       <x-alertd  color="red" >{{ $message }}</x-alertd>

                @enderror
            </div>


            <div>
                <x-label for="imagen">Imagen de la Vacante</x-label>



                <div class="custom-file">
                    <input type="file" wire:model="imagen" accept="image/*" name="imagen"  class="custom-file-input" id="customFileLang" lang="es">
                </div>
                 @error('imagen')
                  <x-alertd  color="red" >{{ $message }}</x-alertd>

                @enderror
            </div>


            <x-alert-success color="green" class="w-full" wire:loading wire:target="imagen" >Cargando...</x-alert-success>
            @if ($imagen)
            <img src="{{ $imagen->temporaryUrl() }}" alt="Vista previa" style="max-width: 300px;">
            @endif
            <div>
                <x-button>Crear Vacante</x-button>
            </div>

    </form>

    </div>
    </div>

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/hcxfrw0pcqi9p4kan39syjk366xqc5icvijln2ofw6a0l43g/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
         tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
      });
    </script>

@endpush

