<?php

namespace App\Http\Controllers\backoffices;

use App\Http\Controllers\Controller;
use App\Models\Amortizacion;
use App\Models\Credito;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TablaAmortizacion extends Controller
{
    //Vista principal de la tabla a mortización
    public function tablaAmortizacion($num_credito){
        
        $tabla = Amortizacion::where('num_credito','=',$num_credito)->paginate(5);
        //$tabla = Credito::where('user_id','=',$user)->join('amortizacion','credito.num_credito','=','amortizacion.num_credito')->paginate(5);
        return view('backoffices.clientes.tablaAmortizacion', ['tabla'=>$tabla,'num_credito'=>$num_credito,'termino'=>'','paginacion'=>0]);
    }
    
    public function busqueda(Request $request){
        $request->validate([
            'num_credito' => 'required',
            'termino' => 'required',
        ]);
        
        $num_credito = $request->num_credito;
        $termino = str_replace(",","",$request->termino);
        $consulta1 = Amortizacion::where('num_credito','=', $num_credito)
        ->where('numero_pagos','=',$termino)->orderBy('numero_pagos', 'desc')->get();
        
        $consulta2 = Amortizacion::where('num_credito','=', $num_credito)
        ->where('interes_anual','=',$termino)->orderBy('numero_pagos', 'desc')->get();
        
        $consulta3 = Amortizacion::where('num_credito','=', $num_credito)->
        where('pag_capital','=',$termino)->orderBy('numero_pagos', 'desc')->get();
        
        $consulta4 = Amortizacion::where('num_credito','=', $num_credito)->
        where('interes_ordinarios','=',$termino)->orderBy('numero_pagos', 'desc')->get();
        
        $consulta5 = Amortizacion::where('num_credito','=', $num_credito)->
        where('iva_io','=',$termino)->orderBy('numero_pagos', 'desc')->get();
        
        $consulta6 = Amortizacion::where('num_credito','=', $num_credito)->
        where('comisiones','=',$termino)->orderBy('numero_pagos', 'desc')->get();
        
        $consulta7 = Amortizacion::where('num_credito','=', $num_credito)->
        where('pago_total_men','=',$termino)->orderBy('numero_pagos', 'desc')->get();

        $consulta8 = Amortizacion::where('num_credito','=', $num_credito)->
        where('prox_pago','=',$termino)->orderBy('numero_pagos', 'desc')->get();

        $tabla = $consulta1->concat($consulta2)->concat($consulta3)->concat($consulta4)->concat($consulta5)->
        concat($consulta6)->concat($consulta7)->concat($consulta8);
        $tabla = $tabla->unique('id_amortizacion');
        
        return view('backoffices.clientes.tablaAmortizacion', ['tabla'=>$tabla,'num_credito'=>$num_credito,'termino'=>$termino,'paginacion'=>1]);
        
        

    }
    //Vista para poder editar un registro
    public function view($t){
        $tabla = Amortizacion::where('id_amortizacion','=',$t)->first();
        return view('backoffices.clientes.edit-amortizacion', compact('tabla'));
    }
    //actualización de un registro
    public function update(Request $request,$id){
        $validate = $request->validate([
            'num_credito' => 'required|min:6|numeric',
            'numero_pagos' =>'required|regex:[^[0-9]+([,][0-9]+)?$]',
            'prox_pago' => 'required|date',
            'interes_anual' => 'required|regex:[^[0-9]+([,][0-9]+)?$]',
            'pag_capital' => 'required|regex:[^[0-9]+([,][0-9]+)?$]',
            'interes_ordinarios' => 'required|regex:[^[0-9]+([,][0-9]+)?$]',
            'iva_io' => 'required|regex:[^[0-9]+([,][0-9]+)?$]',
            'comisiones' => 'required|regex:[^[0-9]+([,][0-9]+)?$]',
            'pago_total_men' => 'required|regex:[^[0-9]+([,][0-9]+)?$]'
        ]);
        //quito las comas y los convierto a numeros
        $num_pagos = str_replace(',',"",$request->numero_pagos);
        $interes_anual = str_replace(',',"",$request->interes_anual);
        $pag_capital = str_replace(',',"",$request->pag_capital);
        $interes_ordinarios = str_replace(',',"",$request->interes_ordinarios);
        $iva_io = str_replace(',',"",$request->iva_io);
        $comisiones = str_replace(',',"",$request->comisiones);
        $pago_total_men = str_replace(',',"",$request->pago_total_men);
        if(Amortizacion::where('id_amortizacion','=',$id)->exists()){
            if(Amortizacion::where('id_amortizacion','=',$id)->value('cobro') != 1){
                $num_cred = Amortizacion::where('id_amortizacion','=',$id)->value('num_credito');
                if($request->num_credito==$num_cred){
                    Amortizacion::where('id_amortizacion','=',$id)->update([
                        'num_credito' => $request->num_credito,
                        'numero_pagos' => $num_pagos,
                        'prox_pago' => $request->prox_pago,
                        'interes_anual' =>$interes_anual,
                        'pag_capital' =>$pag_capital,
                        'interes_ordinarios' => $interes_ordinarios,
                        'iva_io' => $iva_io,
                        'comisiones' =>$comisiones,
                        'pago_total_men' =>$pago_total_men
                    ]); 

                    $fecha_inicio = Amortizacion::where('num_credito','=',$num_cred)->orderby('id_amortizacion','asc')->value('prox_pago');
                    $fecha_termino = Amortizacion::where('num_credito','=',$num_cred)->orderby('id_amortizacion','desc')->value('prox_pago');
                    Credito::where('num_credito','=',$request->num_credito)->update(['fecha_termino'=>$fecha_termino,'fecha_inicio'=>$fecha_inicio]);

                    session()->flash('success');
                    return redirect()->route('tablaAmortizacion',$num_cred);
                }else{
                    session()->flash('error');
                    return back();
                }
            }else{
                session()->flash('modificado');
                return back();
            }
            
        }else{
            session()->flash('error');
            return back();
        }
    }

}
