<div  class="md:w-1/2" >
    <div >
        <form  wire:submit.prevent="guardarVacante" class="space-y-5" enctype="multipart/form-data">

                <div>
                <x-label for="titulo">Título de la vacante
                </x-label>
                    <x-input type="text"   wire:model.live.debounce.500ms="titulo" placeholder="Título Vacante" class="block mt-1 w-full" />

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

                    <textarea  wire:model.live.debounce.500ms="descripcion" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descripción del Puesto"></textarea>


                    @error('descripcion')
                           <x-alertd  color="red" >{{ $message }}</x-alertd>

                    @enderror
                </div>


                <div>
                    <x-label for="imagen">Imagen de la Vacante</x-label>

                    <div class="custom-file">
                        <input type="file" wire:model="imagen_nueva" accept="image/*" class="custom-file-input" id="customFileLang" lang="es">
                    </div>
                    <img src="{{ asset('storage/vacantes/'.$imagen) }}" alt="Vista previa" style="max-width: 300px;">



                    <div class="my-5 w-80">
                        @if($imagen_nueva)
                            <p class="text-sm">Imagen Nueva:</p>
                            <img src="{{ $imagen_nueva->temporaryUrl() }}" alt="Vista previa" style="max-width: 300px;">
                        @endif
                    </div>

                     @error('imagen')
                      <x-alertd  color="red" >{{ $message }}</x-alertd>

                    @enderror
                </div>
                <x-alert-success color="green" class="w-full" wire:loading wire:target="imagen" >Cargando...</x-alert-success>


                <div>
                    <x-button>Guardar Vacante</x-button>
                </div>

        </form>

        </div>
        </div>
    {{-- @push('scripts')
        <script src="https://cdn.tiny.cloud/1/hcxfrw0pcqi9p4kan39syjk366xqc5icvijln2ofw6a0l43g/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
             tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons  link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
          });
        </script>

    @endpush --}}
