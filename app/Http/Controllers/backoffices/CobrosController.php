<?php

namespace App\Http\Controllers\backoffices;

use App\Http\Controllers\Controller;
use App\Models\Amortizacion;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Date;
use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiAuthError;
use Openpay\Data\OpenpayApiConnectionError;
use Openpay\Data\OpenpayApiError;
use Openpay\Data\OpenpayApiRequestError;
use Openpay\Data\OpenpayApiTransactionError;

class CobrosController extends Controller
{
    public function index(){
        // Establecer la zona horaria a México
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d H:i:s');
        // Obtener la fecha restando una hora"
        $fecha_modificada =  date('Y-m-d', strtotime($fecha) - 3600);
        $cobros = Amortizacion::wheredate('prox_pago',$fecha_modificada)->where('cobro','=',0)->get();
        return view('backoffices.cobro.index',compact('cobros'));
    }

    public function cobranza($id){
        $pago = Amortizacion::where('id_amortizacion','=',$id)->get();
        return view('backoffices.cobro.cobranza',compact('pago'));
    }

    public function store(Request $request){        
        /* Valido los datos del formulario */
        $request->validate([
            'nombre' => 'required|exists:users,nombre',
            'num_credito' => 'required|numeric|min:6',
            'telefono' => 'required|numeric|min:10',
            'email' =>'required|exists:users,email',
            'id' => 'required|numeric|exists:amortizacion,id_amortizacion',
        ]);
        /* Traigo el pago a cobrar */
        $amort = Amortizacion::where('id_amortizacion',$request->id)->first();
        $pago =  $amort->pago_total_men;
        
        /* Optengo el ID de la tarjeta a cobrar */
        $informacion = $amort->credito->usuario->informacion_pago->data;
        /* Desencripto del id de la tarjeta */
        $card = Crypt::decrypt($informacion);
        /* ID de openpay del usuario a cobrar */
        $id_openpay = $amort->credito->usuario->openpay_id;
        /*Genero un numero de orden unico con el numero de credito y el numero de pago que se cobra*/
        $orden = 'ORDEN-'.$amort->num_credito.'Pg'.$amort->numero_pagos;
        try{
            $openpay = Openpay::getInstance(env('OPENPAY_MERCHANT_ID'), env('OPENPAY_APP_KEY_PV'));
            $chargeData = array(
                'source_id' => $card,
                'method' => 'card',
                'amount' => $pago,
                'description' => 'Pago credito:'.$amort->num_credito.',Dinero Inmediato',
                'order_id' => $orden,
                'device_session_id' => $request->deviceIdHiddenFieldName
            );
            
            $customer = $openpay->customers->get($id_openpay);
            $charge = $customer->charges->create($chargeData);
            
            
        } catch (OpenpayApiTransactionError $e) {
            $error = "Error de transacción, codigo:".$e->getErrorCode();
            return redirect()->route('cobros.index')->with('mensaje',$error)->with('codigo',$e->getErrorCode());
        } catch (OpenpayApiRequestError $e) {
            $error = "Error de solicitud, codigo:".$e->getErrorCode();
            return redirect()->route('cobros.index')->with('mensaje',$error)->with('codigo',$e->getErrorCode());
        } catch (OpenpayApiConnectionError $e) {
            $error = "Error de conexión, codigo:".$e->getErrorCode();
            return redirect()->route('cobros.index')->with('mensaje',$error)->with('codigo',$e->getErrorCode());
        } catch (OpenpayApiAuthError $e) {
            echo $error = "Error de autenticación, codigo:".$e->getErrorCode();
            return redirect()->route('cobros.index')->with('mensaje',$error)->with('codigo',$e->getErrorCode());
        } catch (OpenpayApiError $e) {
            echo $error = "Error de OpenPay, codigo:".$e->getErrorCode();
            return redirect()->route('cobros.index')->with('mensaje',$error)->with('codigo',$e->getErrorCode());
        } catch (Exception $e) {
            echo $error = "Error general" .$e->getMessage();            
            return redirect()->route('cobros.index')->with('mensaje',$error);
        }
        $amort = Amortizacion::where('id_amortizacion',$request->id)->update(['cobro'=>1]);
        return redirect()->route('cobros.index')->with('success','Cobro realizaco con exito');
    }

    public function metodo($id){
        $openpay = Openpay::getInstance(env('OPENPAY_MERCHANT_ID'), env('OPENPAY_APP_KEY_PV'));
        $customer = $openpay->customers->get($id);
        $customer->delete();
    }
}
