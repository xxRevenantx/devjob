<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf|max:5120'
    ];

    protected $messages = [
        'cv.required' => 'El campo CV es obligatorio',
        'cv.mimes' => 'El campo CV debe ser un archivo PDF',
        'cv.max' => 'El campo CV no debe exceder los 5MB'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        // ALMACENAR EL CV
        $cv = $this->cv->store('cv');
        $datos['cv'] = str_replace('vacantes/', '', $cv);


        // CREAR EL CANDIDATO
        $this->vacante->candidatos()->create([
            'cv' => $datos['cv'],
            'user_id' => auth()->user()->id
        ]);

        // CREAR NOTIFICACIÓN
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        // MOSTRAR MENSAJE DE CONFIRMACIÓN
        $this->reset();

        session()->flash('message', 'Vacante enviada correctamente');

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
