<?php

namespace App\Http\Controllers\backoffices;

use App\Http\Controllers\Controller;
use App\Models\Credito;
use App\Models\CreditoFinalizado;
use App\Models\Pagos;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CreditoFinalizadoController extends Controller
{
    public function historialMontosAutorizados($user){
        $credito = Credito::where('user_id','=',$user)->where('estado','=',2)->paginate(5);
        return view('backoffices.clientes.historialMontosAutorizados',['credito'=>$credito,'user' => $user,'paginate'=>0]);
    }

    public function credito_finalizado(){
        $creditofinalizado = CreditoFinalizado::paginate(5);
        return view('backoffices.clientes.credito-finalizado',['creditofinalizado'=>$creditofinalizado,'busqueda'=>'','fecha_inicio'=>'','fecha_termino'=>'']);        
    }

    //Filtro de busqueda de creditos finalizados
    public function busquedacf(Request $request){
        if(empty($request->busqueda) && empty($request->fecha_inicio) && empty($request->fecha_termino)){
            $request->validate([
                'busqueda' => 'required',
                'fecha_inicio' => 'required|date',
                'fecha_termino' => 'required|date'
            ]);
        }
        if(!empty($request->busqueda)){
            if( $request->busqueda == 'Vigente' || $request->busqueda == 'vigente'){
                $consulta = CreditoFinalizado::where('credito_actual','=','1')->paginate(5);
                return view('backoffices.clientes.credito-finalizado',['creditofinalizado'=>$consulta,'busqueda'=>$request->busqueda,'fecha_inicio'=>$request->fecha_inicio,'fecha_termino'=>$request->fecha_termino]);
            }
            if($request->busqueda=='Inactivo' || $request->busqueda == 'inactivo'){
                $consulta = CreditoFinalizado::where('credito_actual','=','0')->paginate(5);
                return view('backoffices.clientes.credito-finalizado',['creditofinalizado'=>$consulta,'busqueda'=>$request->busqueda,'fecha_inicio'=>$request->fecha_inicio,'fecha_termino'=>$request->fecha_termino]); 
            }
            $consulta = CreditoFinalizado::orwhere('nombre','LIKE','%'.$request->busqueda.'%')
            ->orwhere('num_creditos_fin','=',$request->busqueda)->paginate(5);
            return view('backoffices.clientes.credito-finalizado',['creditofinalizado'=>$consulta,'busqueda'=>$request->busqueda,'fecha_inicio'=>'','fecha_termino'=>$request->fecha_termino]); 
        }  
        if(!empty($request->fecha_inicio)&& !empty($request->fecha_termino)){
            $request->validate([
                'fecha_inicio' => 'date',
                'fecha_termino' => 'date'
            ]);
            $consulta = CreditoFinalizado::whereBetween('created_at',[$request->fecha_inicio,$request->fecha_termino])->paginate(5);
            return view('backoffices.clientes.credito-finalizado',['creditofinalizado'=>$consulta,'busqueda'=>$request->busqueda,'fecha_inicio'=>$request->fecha_inicio,'fecha_termino'=>$request->fecha_termino]);
        }
        
    }

    public function historialPagos($user){        
        $pagos = Credito::where('user_id','=',$user)->join('pagos_credito','credito.num_credito','=','pagos_credito.num_credito')->paginate(5);
        return view('backoffices.clientes.historialPagos', ['pagos'=>$pagos,'id'=> $user,'paginacion'=>1]);
    }

    public function busquedapago(Request $request){
        $request->validate([
            'busqueda' => 'required',
            'id' => 'required',
        ]);
        $contador = strpos($request->busqueda,'-');
        $user = $request->id;

        if(empty($contador)){
            
            $coma = str_replace(",","", $request->busqueda);
            $dinero = str_replace("$","",$coma);
            $busqueda = (int)$dinero;
            $consulta1 = Credito::where('user_id','=',$user)->join('pagos_credito','credito.num_credito','=','pagos_credito.num_credito')
            ->where('monto_pago','=',$busqueda)->get();
            $consulta2 = Credito::where('user_id','=',$user)->join('pagos_credito','credito.num_credito','=','pagos_credito.num_credito')
            ->where('saldo_insoluto','=',$busqueda)->get();
            $consulta3 = Credito::where('user_id','=',$user)->join('pagos_credito','credito.num_credito','=','pagos_credito.num_credito')
            ->where('numero_pagos','=',$busqueda)->get();
            
            $pagos = $consulta1->concat($consulta2)->concat($consulta3);
            $pagos->unique('id_pago');
            

            
            return view('backoffices.clientes.historialPagos', ['pagos'=>$pagos,'id'=> $user,'busqueda'=>$request->busqueda,'paginacion'=>0]);
        }else{
            
            $pagos = Credito::where('user_id','=',$user)->join('pagos_credito','credito.num_credito','=','pagos_credito.num_credito')
            ->where('fecha_pago','=',$request->busqueda)->paginate(5);
            return view('backoffices.clientes.historialPagos', ['pagos'=>$pagos,'id'=> $user,'paginacion'=>1]);
        }
        
        
    }  
  
}
