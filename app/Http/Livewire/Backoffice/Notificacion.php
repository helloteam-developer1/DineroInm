<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Notificaciones;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Notificacion extends Component
{
    public $mensaje;
    public $caracteres=0;

    protected $rules = [
        'mensaje' => 'required|min:10'
    ];

    public function render()
    {
        //$usuarios = User::orderby('id','DESC')->pluck('id');
        return view('livewire.backoffice.notificacion');
    }

    public function updatedMensaje(){
        //elimino los espacios en blanco para que se junten todas las letras
        $espacios  =preg_replace("/[[:space:]]/","",trim($this->mensaje));
        //contabilizo los caracteres y los muestro
        $this->caracteres = strlen($espacios);
        $this->resetErrorBag();
    }

    public function clear(){
        $this->reset('mensaje');
        $this->reset('caracteres');
    }

    public function save(){
        $this->validate();
        $usuarios = User::orderby('id','DESC')->pluck('id');
        foreach($usuarios as $u){
            Notificaciones::create([
                'user_id' => $u,
                'titulo_notf' => 'Titulo de prueba desde el backoffice',
                'sub_notf' => 'Subtitulo de notificación desde el backoffice',
                'cuerpo' => $this->mensaje,
                'fecha_envio' => Carbon::now(),
                'estado' => 0
            ]);  
        }
        $this->emit('alert');
    }
}
