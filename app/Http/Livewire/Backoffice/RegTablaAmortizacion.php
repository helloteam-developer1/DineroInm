<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Amortizacion;
use App\Models\Credito;
use Livewire\Component;

class RegTablaAmortizacion extends Component
{
    public $num_credito;
    public $num_pagos, $prox_pago,$interes_anual,$pago_capital,$interes_o,$iva_io,$comisiones;
    public $pago_t_mensual;

    protected $rules = [
        'num_credito' => 'required|min:6|numeric',
        'num_pagos' =>'required|numeric',
        'interes_anual' => 'required|numeric',
        'prox_pago' => 'required|date',
        'pago_capital' => 'required|numeric',
        'interes_o' => 'required|numeric',
        'iva_io' => 'required|numeric',
        'comisiones' => 'required|numeric',
        'pago_t_mensual' => 'required|numeric'
    ];

  /*   protected $messages = [
        'num_credito.required' =>'El número de crédito es requerido.',
        'num_credito.min' => 'El número de crédito debe tener minimo 6 caracteres'
        'num_credito.numeric' => 
        'num_credito.num_pagos' =>'required|numeric',
        'interes_anual' => 'required|numeric',
        'prox_pago' => 'required|date',
        'pago_capital' => 'required|numeric',
        'interes_o' => 'required|numeric',
        'iva_io' => 'required|numeric',
        'comisiones' => 'required|numeric',
        'pago_t_mensual' => 'required|numeric'
    ]; */

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.backoffice.reg-tabla-amortizacion');
    }

    public function mount($num_credito){
        $this->num_credito = $num_credito;
    }

    public function registroT($num_credito){
        $this->validate();
        
        Amortizacion::create([
            'num_credito' => $this->num_credito,
            'numero_pagos' => $this->num_pagos,
            'prox_pago' => $this->prox_pago,
            'interes_anual' => $this->interes_anual,
            'pag_capital' => $this->pago_capital,
            'interes_ordinarios' => $this->interes_o,
            'iva_io' => $this->iva_io,
            'comisiones' => $this->comisiones,
            'pago_total_men' => $this->pago_t_mensual
        ]);
        $contador = Amortizacion::where('num_credito','=',$num_credito)->count();
        $primero = Amortizacion::where('num_credito','=',$num_credito)->orderby('id_amortizacion','asc')->first();
        $ultimo = Amortizacion::where('num_credito','=',$num_credito)->orderby('id_amortizacion','desc')->first();
         
        
        Credito::where('num_credito','=',$this->num_credito)->update([
            'num_pagos'=>$contador,
            'fecha_inicio'=> $primero->prox_pago,
            'fecha_termino' =>$ultimo->prox_pago
        ]);
        session()->flash('registro','El registro se creo con exito');
        $ruta = route('tablaAmortizacion',$num_credito);
        $this->emit('registro',$ruta);
    }
}
