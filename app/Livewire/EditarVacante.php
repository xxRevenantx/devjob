<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    use WithFileUploads;

    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;


    protected $rules = [
        'titulo' => 'required|string|max:255',
        'salario' => 'required|integer|min:1',
        'categoria' => 'required|integer|min:1',
        'empresa' => 'required|string|max:255',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required',
        'imagen' => 'required|max:2048',
        'imagen_nueva' => 'nullable|image|max:2048'


    ];

    protected $messages = [
        'titulo.required' => 'El campo título es obligatorio',
        'titulo.string' => 'El campo título debe ser un texto',
        'titulo.max' => 'El campo título no debe exceder los 255 caracteres',
        'salario.required' => 'El campo salario es obligatorio',
        'salario.min' => 'Selecciona un salario',
        'categoria.required' => 'El campo categoría es obligatorio',
        'categoria.min' => 'Selecciona una categoría',
        'empresa.required' => 'El campo empresa es obligatorio',
        'empresa.string' => 'El campo empresa debe ser un texto',
        'empresa.max' => 'El campo empresa no debe exceder los 255 caracteres',
        'ultimo_dia.required' => 'El campo último día es obligatorio',
        'ultimo_dia.date' => 'El campo último día debe ser una fecha',
        'descripcion.required' => 'El campo descripción es obligatorio',
        'descripcion.string' => 'El campo descripción debe ser un texto',
        'descripcion.max' => 'El campo descripción no debe exceder los 255 caracteres',
        'imagen.required' => 'El campo imagen es obligatorio',
        'imagen.image' => 'El campo imagen debe ser una imagen',
        'imagen.max' => 'El campo imagen no debe exceder los 2048 kilobytes'

    ];


    public function updated($propertyName) // ACTUALIZAR EN TIEMPO REAL
    {
        $this->validateOnly($propertyName);
    }


    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d'); // Formatear fecha a Y-m-d para mostrar en el input date
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;


    }

    // GUARDAR VACANTE
    public function guardarVacante(){

        $datos = $this->validate();

        // SI HAY UNA NUEVA IMAGEN
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('vacantes');
            $datos['imagen'] = str_replace('vacantes/', '', $imagen);
        }


        // ENCONRAR LA VACANTE

        $vacante = Vacante::find($this->vacante_id);

        // ASIGNAR VALORES
        $vacante->titulo = $this->titulo;
        $vacante->salario_id = $this->salario;
        $vacante->categoria_id = $this->categoria;
        $vacante->empresa = $this->empresa;
        $vacante->ultimo_dia = $this->ultimo_dia;
        $vacante->descripcion = $this->descripcion;
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

        // GUARDAR LA VACANTE
        $vacante->save();

        // MENSAJE
        session()->flash('message', 'La vacante se actualizó correctamente');

        // Redireccionar
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', compact('salarios', 'categorias'));
    }
}
