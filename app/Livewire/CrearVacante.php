<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;


use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Usernotnull\Toast\Concerns\WireToast;
use Usernotnull\Toast\Toast;

class CrearVacante extends Component
{

    use WireToast; // <-- add this

    use WithFileUploads;

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;



    protected $rules = [
        'titulo' => 'required|string|max:255',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required|string|max:255',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required|string|max:255',
        'imagen' => 'required|max:2048',




    ];

    protected $messages = [
        'titulo.required' => 'El campo título es obligatorio',
        'titulo.string' => 'El campo título debe ser un texto',
        'titulo.max' => 'El campo título no debe exceder los 255 caracteres',
        'salario.required' => 'El campo salario es obligatorio',
        'categoria.required' => 'El campo categoría es obligatorio',
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
        'imagen.max' => 'El campo imagen no debe exceder los 2048 kilobytes',



    ];




    public function updated($propertyName) // ACTUALIZAR EN TIEMPO REAL
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        // Se validan los campos

        $datos = $this->validate();

        // $imagen = Storage::putFile('public/vacantes', new File($this->imagen[0]['path']));
        $imagen = $this->imagen->store('vacantes');
        $datos["imagen"] = str_replace('vacantes/', '', $imagen);


        // Se crea la vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id
        ]);

        $this->reset();

        session()->flash('message', 'Vacante agregada exitosamente');

        return redirect()->route('vacantes.index');

        // toast()
        // ->success('Vacante agregada exitosamente')
        // ->push();

    }


    public function mount(){
        $this->ultimo_dia = date('Y-m-d');




    }

    public function render()
    {
        // Se renderiza la vista de la creación de la vacante
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', compact('salarios', 'categorias'));
    }
}
