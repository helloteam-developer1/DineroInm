<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amortizacion extends Model
{
    use HasFactory;
    protected $table = 'amortizacion';
    protected $fillable = [ 
        'num_credito',
        'numero_pagos',
        'prox_pago',
        'interes_anual',
        'pag_capital', 
        'interes_ordinarios',
        'iva_io',
        'comisiones',
        'pago_total_men',
        'cobro'
    ];

    public function credito()
    {
        return $this->belongsTo(Credito::class, 'num_credito', 'num_credito');
    }
    public $timestamps = false;

    
}
