<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Amortizacion;
use App\Models\Credito;
use Carbon\Carbon;
use DateTime;
use DateTimeImmutable;
use Livewire\Component;

class EliminarAmortizacion extends Component
{
    public $re;
    public $num_credito,$mensaje;
    public function render()
    {
        return view('livewire.backoffice.eliminar-amortizacion');
    }
    public function mount($re){
        $this->re = $re;
    }
    public function eliminar($re){
        if(Amortizacion::where('id_amortizacion','=',$re)->exists()){
            $datos = Amortizacion::where('id_amortizacion','=',$re)->value('num_credito');
            //Elimino el registro
            Amortizacion::where('id_amortizacion','=',$re)->delete();
            ///Contamos el numero de registros en la tabla de amortización
            $contador = Amortizacion::where('num_credito','=',$datos)->count();
            
            //Actualizo la cantidad de datos en la tabla amortizacion
            if($contador==0){
                Credito::where('num_credito','=',$datos)->update(['num_pagos'=>null,'fecha_inicio'=>null,'fecha_termino'=>null]);
            }else{
                $fecha = Amortizacion::where('num_credito','=',$datos)->orderby('id_amortizacion','desc')->value('prox_pago');
                $fecha_inicio = Amortizacion::where('num_credito','=',$datos)->orderby('id_amortizacion','asc')->value('prox_pago');
                
                
                Credito::where('num_credito','=',$datos)->update(['num_pagos'=>$contador,'fecha_termino'=>$fecha,'fecha_inicio'=>$fecha_inicio]);
            }
            $ruta = route('tablaAmortizacion',$datos);
            $this->emit('eliminar',$ruta);
        }else{
            $this->emit('error_a');
        }
    }
}
