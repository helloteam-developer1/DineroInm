<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Amortizacion;
use App\Models\Credito;
use App\Models\Pagos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RegTablapagos extends Component
{
    public $num_credito, $n_credito;
    public $numero_pagos, $fecha_pago,$monto_pago,$saldo_insoluto=0,$pago_rest=0,$resta_pagar=0;
    protected $rules = [
        'n_credito' => 'required|exists:credito,num_credito',
        'numero_pagos' => 'required|numeric',
        'fecha_pago' => 'required|date',
        'monto_pago' => 'required|numeric'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.backoffice.reg-tablapagos');
    }
    public function mount($num_credito){
        $this->num_credito = $num_credito;
        $this->n_credito = $num_credito;
    }

    public function registroP(){
        if($this->n_credito!=$this->num_credito){
            $this->addError('num_credito','El numero de clientes no coincide');
        }else{
            $contador = Amortizacion::where('num_credito','=',$this->num_credito)->count();
            if($contador==0){
                $this->addError('pagos','No existen registros en tabla amortización, por favor ingresa un registro primero en tabla amortización.');
            }else{
                //validación del formulario
                $this->validate();
                if(Pagos::where('num_credito','=',$this->num_credito)->count()==0){
                    $this->primerregistro();
                }else{
                    $this->registro();
                }
                $this->pagosrestantes();
                $ruta = route('tablaPagos',$this->num_credito);
                $this->emit('registroP',$ruta);
            }
        }
    }
    public function primerregistro(){
        $consulta = Amortizacion::where('num_credito','=',$this->num_credito)->pluck('pago_total_men')->toArray();
        $suma_amortizacion = array_sum($consulta);
        //Calculo Saldo Insoluto
        $this->saldo_insoluto = $suma_amortizacion-$this->monto_pago;
        //Pago Restante (Nuevo saldo Insoluto)
        $this->pago_rest = $this->saldo_insoluto;
        
        Pagos::create([
            'num_credito' => $this->num_credito,
            'numero_pagos' => $this->numero_pagos,
            'fecha_pago' => $this->fecha_pago,
            'monto_pago' => $this->monto_pago,
            'saldo_insoluto' => $this->saldo_insoluto,
            'pago_rest' => $this->saldo_insoluto,
            'resta_pagar' => null
        ]);
        $id = Pagos::orderby('id_pago','desc')->first();
        
        //suma de pagos hasta el momento
        $consulta = Pagos::where('num_credito','=',$this->num_credito)->pluck('monto_pago')->toArray();
        $suma_pagos = array_sum($consulta);
        //Resta pagar
        $this->resta_pagar = $suma_amortizacion - $suma_pagos;
        $modificación = Pagos::where('id_pago','=',$id->id_pago)->update(['resta_pagar'=> $this->resta_pagar]);
    }

    public function registro(){
        //total de la tabla de amortizacion
        $consulta = Amortizacion::where('num_credito','=',$this->num_credito)->pluck('pago_total_men')->toArray();
        $saldo_amortizacion = array_sum($consulta);
        //ultimo registro para consultar pago restante 
        $consulta = Pagos::where('num_credito','=',$this->num_credito)->orderby('id_pago','desc')->get();
        $pago_rest = $consulta[0]->pago_rest;
        $resta_pagar = $consulta[0]->resta_pagar;
        ///calculo
        ///Saldo Insoluto nuevo
        $this->saldo_insoluto = $pago_rest - $this->monto_pago;
        //nuevo Saldo Insoluto base
        $this->pago_rest = $this->saldo_insoluto;
        Pagos::create([
            'num_credito' => $this->num_credito,
            'numero_pagos' => $this->numero_pagos,
            'fecha_pago' => $this->fecha_pago,
            'monto_pago' => $this->monto_pago,
            'saldo_insoluto' => $this->saldo_insoluto,
            'pago_rest' => $this->saldo_insoluto,
            'resta_pagar' => null
        ]);
        
        $id_ultimo = Pagos::orderby('id_pago','desc')->first();
        
        
        //suma de pagos hasta el momento
        $consulta = Pagos::where('num_credito','=',$this->num_credito)->pluck('monto_pago')->toArray();
        $suma_pagos = array_sum($consulta);
        //Resta pagar
        $this->resta_pagar = $saldo_amortizacion - $suma_pagos;
        $modificación = Pagos::where('id_pago','=',$id_ultimo->id_pago)->update(['resta_pagar'=> $this->resta_pagar]);
        
    }
    public function pagosrestantes(){
        $consulta = Pagos::where('num_credito','=',$this->num_credito)->count();
        $contador = Amortizacion::where('num_credito','=',$this->num_credito)->count();
        $resultado = $contador-$consulta;
        Credito::where('num_credito','=',$this->num_credito)->update(['num_pagos_rest'=>$resultado]);
    }
}
