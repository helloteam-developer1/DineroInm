<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Credito;
use App\Models\Pagos;
use GuzzleHttp\Promise\Create;
use Livewire\Component;

class EliminarTablapagos extends Component
{
    public $re;
    public function render()
    {
        return view('livewire.backoffice.eliminar-tablapagos');
    }
    public function mount($re){
        $this->re = $re;
    }

    public function eliminar($re){
        if(Pagos::where('id_pago','=',$re)->exists()){
            $num_credito = Pagos::where('id_pago','=',$re)->value('num_credito');
            //Elimino el registro 
            Pagos::where('id_pago','=',$re)->delete();
            //Cuento cuantos datos existen ahora
            $contador = Pagos::where('num_credito','=',$num_credito)->count();
            if($contador==0){
                Credito::where('num_credito','=',$num_credito)->update(['num_pagos_rest'=>null]);
            }else{
                Credito::where('num_credito','=',$num_credito)->update(['num_pagos_rest'=>$contador]);
            }
            $ruta = route('tablaPagos',$num_credito);
            $this->emit('eliminarP',$ruta);
        }else{
            $this->emit('error_p');
        }
    }
}
