<?php

namespace App\Http\Controllers\backoffices;

use App\Http\Controllers\Controller;
use App\Models\Buzon;
use Illuminate\Http\Request;

class BuzonController extends Controller
{
    public function eliminar(Buzon $id){
        $id->delete();
        return back();
    }
}
