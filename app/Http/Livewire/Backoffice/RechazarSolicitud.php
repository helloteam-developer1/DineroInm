<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Solicitud_Credito;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class RechazarSolicitud extends Component
{
    public $user,$texto,$mensaje;
    public $contador=0;
    protected $rules = ['texto' => 'required'];

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backoffice.rechazar-solicitud');
    }

    public function rechazar($id){
        
        $this->validate();
        
       if( Solicitud_Credito::where('user_id','=',$id)->exists()){
            Solicitud_Credito::where('user_id','=',$id)->update([
                'estado'=>2,
                'mensaje' => $this->texto,
                'documentacion' => '2',
                'fecha_solicitud' => Carbon::now()->format('Y-m-d')
            ]);
            $this->emit('alert');
       }else{
            $this->addError('error','No existe la solicitud por favor ponte en contacto con soporte tecnico.');
       }

    }

    public function updatedTexto(){
        //elimino los espacios en blanco para que se junten todas las letras
        $espacios  =preg_replace("/[[:space:]]/","",trim($this->texto));
        //contabilizo los caracteres y los muestro
        $this->contador = strlen($espacios);
    }
    
}
