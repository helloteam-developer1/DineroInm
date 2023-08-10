<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre', 
        'curp', 
        'fecha_nacimiento', 
        'empresa_trabajo', 
        'rama_empresa',
        'antiguedad',
        'banco_nomina', 
        'email', 
        'password', 
        'telefono_contacto', 
        'direccion',
        'ine_frente',
        'ine_reverso', 
        'comp_dom', 
        'foto_cine', 
        'prestamo',
        'tiempo',
        'trabajo',
        'ingreso',
        'nomina',
        'credito',
        'tarjeta_reg',
        'num_cliente',
        'rol'
    ];

    public function informacion_pago(){
        return $this->belongsTo(InformacionPago::class,'id','user_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
