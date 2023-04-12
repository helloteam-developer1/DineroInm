<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Amortizacion;
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
        $this->emit('registro');
    }
}