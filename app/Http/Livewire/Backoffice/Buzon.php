<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Buzon as ModelsBuzon;
use Livewire\Component;

class Buzon extends Component
{
    public $notificacion;
    public function render()
    {
        $this->notificacion = ModelsBuzon::count();
        $datos = ModelsBuzon::all();
        return view('livewire.backoffice.buzon', compact('datos'));
    }
}
