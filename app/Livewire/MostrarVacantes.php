<?php

namespace App\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MostrarVacantes extends Component
{



    public function eliminarVacante($vacante_id)
    {
        $vacante = Vacante::find($vacante_id);



        if ($vacante->imagen) {
            Storage::delete("vacantes/" . $vacante->imagen);
        }

        $vacante->delete();

        // session()->flash('message', 'La vacante se eliminó correctamente');

    }


    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', compact('vacantes'));
    }
}
