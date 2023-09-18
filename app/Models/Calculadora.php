<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculadora extends Model
{
    use HasFactory;
    protected $fillable = [
       'id','prestamo','tiempo','nombre','trabajo','ingreso','nomina','credito'
    ];
    public $timestamps = false;
}
