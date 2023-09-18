<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $table = 'credito';
    use HasFactory;

    protected $fillable = [
        'num_credito',
        'num_cliente',
        'user_id',
        'monto_aut',
        'fecha_inicio', 
        'num_pagos',
        'num_pagos_rest',
        'fecha_termino', 
        'estado'
    ];

    public const ESTADO = [
        'Linea de Crédito Aprobada.', //0
        'Credito Vencido Impago.', //1
        'Finalizado'//2 
    ];
    public function estado(){
        return self::ESTADO[$this->estado];
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id','id');   
    }
}
