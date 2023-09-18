<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionPago extends Model
{
    use HasFactory;
    protected $table = "informacion_de_pago";
    public $timestamps = false;
    protected $fillable = [
        'id_forma_de_pago',
        'data',
        'user_id'
    ];
}
