<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buzon extends Model
{
    use HasFactory;
    protected $table = 'buzon_backoffice';
    protected $fillable = ['user_id','informacion'];
    public $timestamps = false;
    
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
