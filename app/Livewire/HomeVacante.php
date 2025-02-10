<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacante extends Component
{
    public function render()
    {
        $vacantes = Vacante::all();

        return view('livewire.home-vacante', compact('vacantes'));
    }
}
