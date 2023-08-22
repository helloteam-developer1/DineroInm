<?php

namespace App\Http\Controllers\backoffices;

use App\Http\Controllers\Controller;
use App\Models\ClientesAceptados;
use App\Models\Credito;
use App\Models\CreditoFinalizado;
use App\Models\CreditoVencido;
use App\Models\InformacionPago;
use App\Models\Pagos;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDO;

class clientesController extends Controller
{
    //vista solicitudes de crédito
    public function solicitud(){
        $datos = ['id','ine_frente','ine_reverso','comp_dom','foto_cine',
            'nombre','trabajo','ingreso','nomina','credito', 'curp', 'fecha_nacimiento','empresa_trabajo', 'rama_empresa','telefono_contacto', 'email','monto','user_id','tarjeta_reg','id_solicitud'];
        $consulta = User::select($datos)->join('solicitud_creditos','users.id','=','solicitud_creditos.user_id')->orderby('id_solicitud','DESC')->paginate(5);
        return view('backoffices.clientes.solicitud-clientes',['consulta'=>$consulta,'busqueda'=>'','fecha_inicio'=>'','fecha_termino'=>'']);
    }
    ///Filtro de busqueda Solicitud de Clientes
    public function busqueda(Request $request){     
        if($request->busqueda==null && $request->fecha_inicio==null && $request->fecha_termino==null){
            $request->validate([
                'fecha_inicio' => 'required',
                'fecha_termino' => 'required',
                'busqueda' => 'required'
            ]);
        }else{
                if($request->fecha_inicio!=null || $request->fecha_termino!=null){
                    $request->validate([
                        'fecha_inicio' => 'required',
                        'fecha_termino' => 'required'
                    ]);
                    $consulta =   User::join('solicitud_creditos','users.id','=','solicitud_creditos.user_id')->
                    wherebetween('fecha_solicitud',[$request->fecha_inicio,$request->fecha_termino])->paginate(5);
                    return view('backoffices.clientes.solicitud-clientes',
                    ['consulta'=>$consulta,'busqueda'=>$request->busqueda,'fecha_inicio'=>$request->fecha_inicio,'fecha_termino'=>$request->fecha_termino]);
                }
                $consulta =   User::join('solicitud_creditos','users.id','=','solicitud_creditos.user_id')->
                    wherebetween('fecha_solicitud',[$request->fecha_inicio,$request->fecha_termino])->
                    orwhere('nombre','LIKE','%'.$request->busqueda.'%')->orwhere('trabajo','=',$request->busqueda)->
                    orwhere('ingreso','=','%'.$request->busqueda.'%')->orwhere('nomina','=',$request->busqueda)->
                    orwhere('credito','=',$request->busqueda)->
                    orwhere('curp','=',$request->busqueda)->orwhere('fecha_nacimiento','=',$request->busqueda)->
                    orwhere('empresa_trabajo','=',$request->busqueda)->orwhere('rama_empresa','=',$request->busqueda)
                    ->orwhere('telefono_contacto','=',$request->busqueda)->orwhere('email','=',$request->busqueda)->paginate(5);
                    return view('backoffices.clientes.solicitud-clientes',
                    ['consulta'=>$consulta,'busqueda'=>$request->busqueda,'fecha_inicio'=>$request->fecha_inicio,'fecha_termino'=>$request->fecha_termino]);
        }
    }

    public function masInformacion($user){;
        $user = User::where('id','=',$user)->get();
        
        return view('backoffices.clientes.masInformacion',compact('user'));
    }
  
    public function busquedahistorialMA(Request $request){
        $request->validate([
            'busqueda' => 'required',
            'user' => 'required'
        ]);
        
        $busqueda = $request->busqueda;
        
        $credito1 = Credito::where('user_id','=',$request->user)->where('estado','=',2)->where('num_pagos','=',$request->busqueda)->paginate(5);
        if($credito1->count()){
            return view('backoffices.clientes.historialMontosAutorizados',['credito'=>$credito1,'user'=>$request->user,'busqueda'=>$request->busqueda]);
        }    
        
        $credito3 = Credito::where('user_id','=',$request->user)->where('estado','=',2)->where('monto_aut','LIKE','%'.$request->busqueda.'%')->paginate(5);
        if($credito3->count()){
            return view('backoffices.clientes.historialMontosAutorizados',['credito'=>$credito3 ,'user'=>$request->user,'busqueda'=>$request->busqueda]);
        }
        
        if(strpos($busqueda,'-')){
            $credito2 = Credito::where('user_id','=',$request->user)->where('estado','=',2)->where('fecha_termino','=',$request->busqueda)->paginate(5);
            if($credito2->count()){
                return view('backoffices.clientes.historialMontosAutorizados',['credito'=>$credito2 ,'user'=>$request->user,'busqueda'=>$request->busqueda]);            
            } 
        }

        return view('backoffices.clientes.historialMontosAutorizados',['user'=>$request->user,'busqueda'=>$request->busqueda]);            

        
        
        
    }
}