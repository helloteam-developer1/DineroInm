<?php

namespace App\Http\Livewire\AppCliente;

use App\Http\Controllers\AppCliente\SolicitarCredito;
use App\Models\Credito;
use App\Models\Solicitud_Credito;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Miperfil extends Component
{

    public $nombre,$telefono_contacto,$email;

    public function mount(){
        $this->nombre = auth()->user()->nombre;
        $this->telefono_contacto = auth()->user()->telefono_contacto;
        $this->email = auth()->user()->email;
    }

    public function render()
    {
        return view('livewire.app-cliente.miperfil');
    }


    public function guardar(){
        $validatedData = $this->validate([
            'email' => 'required|regex:/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i|unique:users',
            'nombre'=> ['required','min:15','max:120','regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/'],
            'telefono_contacto' => 'required|numeric|digits_between:10,10',
        ]);
        User::where('id','=',Auth::user()->id)->update(['email'=>$this->email,'nombre'=>$this->nombre,'telefono_contacto'=>$this->telefono_contacto]); 
        $this->emit('success','Actualizando...');
    }
}
