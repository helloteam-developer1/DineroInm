<?php

namespace App\Http\Livewire\AppCliente;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DatosContacto extends Component
{
    public $calle, $numero,$num_int, $colonia, $cp, $municipio, $estado;

    protected $rules = [
        'calle' => 'required|regex:/^[a-zA-Z0-9áéíóúüÁÉÍÓÚÜ. ]+$/',
        'numero' => 'required|numeric|regex:^[A-Za-z0-9\-]+$',
        'num_int' => 'required|numeric|regex:^[A-Za-z0-9\-]+$',
        'colonia' => 'required|regex:/^[a-zA-Z0-9áéíóúüÁÉÍÓÚÜ. ]+$/',
        'cp'=> 'required|digits_between:5,5|numeric',
        'municipio' => 'required|regex:/^[a-zA-Z0-9áéíóúüÁÉÍÓÚÜ. ]+$/',
        'estado' => 'required|regex:/^[a-zA-Z0-9áéíóúüÁÉÍÓÚÜ. ]+$/'
    ];

    public function render()
    {
        return view('livewire.app-cliente.datos-contacto');
    }

    public function submit(){
        
        $direccion = $this->calle.','.$this->numero.','.$this->num_int.','.$this->colonia.','.$this->cp.','.$this->municipio.','.$this->estado;
        User::where('id','=',Auth::user()->id)->update(['direccion'=>$direccion]);
        $this->emit('registro','exito');
    }
}
