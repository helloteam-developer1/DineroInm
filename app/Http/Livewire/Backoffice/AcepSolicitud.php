<?php

namespace App\Http\Livewire\Backoffice;

use App\Mail\Backoffice\CreditoAprob;
use App\Models\ClientesAceptados;
use App\Models\Credito;
use App\Models\CreditoFinalizado;
use App\Models\InformacionPago;
use App\Models\Solicitud_Credito;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

use Illuminate\Support\Str;
use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiAuthError;
use Openpay\Data\OpenpayApiConnectionError;
use Openpay\Data\OpenpayApiError;
use Openpay\Data\OpenpayApiRequestError;
use Openpay\Data\OpenpayApiTransactionError;

class AcepSolicitud extends Component
{
    public $user, $monto,$confirmacion,$monto_sol,$errores;

    public function mount(User $user){
        $this->user = $user;
        $this->monto_sol = Solicitud_Credito::where('user_id','=',$user->id)->value('monto');
    }

    protected $rules = [
        'monto' => 'required',
        'confirmacion' => 'required'
    ];
    
    public function aceptar($id){
        $this->validate();
        if($this->monto == $this->confirmacion){
           if(strcmp($this->monto,$this->confirmacion)==0){
            if(User::where('id','=',$id)->value('num_cliente')!=null){
                //Si el usuario tiene un num de cliente creo solo el credito y doy de alta en clientes
                //aceptados
                $this->crearcredito($id);
            }else{
                //Genero num de cliente, credito y alta en clientes aceptados
                $this->generarnum($id);         
            }
           }
            try{
                $data = [$this->user->nombre,$this->monto];
                Mail::to($this->user->email)->send(new CreditoAprob($data));
            }catch(Exception $e){
                $this->addError('igual','Error al envio de notificación al usuario');
            }
           $this->emit('alert');
           $this->reset(['monto','confirmacion']);
        }else{
            $this->addError('igual','Los montos no son iguales.');
        }
    }

    public function updated($propertyName){
        $this->resetErrorBag();
        $this->validateOnly($propertyName);
    }

    public function updatedMonto(){
        $signo = str_replace("$","",$this->monto);
        $nuevo = str_replace(",","",$signo);
         if(is_numeric($nuevo)){
            if($nuevo>=100000){
                $this->addError('maximo', 'El monto no puede superar los $100,000.00');
                $this->monto = '$'.number_format(100000,2);
            }
            else{
                if($nuevo<=0){
                    $this->addError('cero','El monto no puede ser menor a 0');
                }else{                    
                    $this->monto = '$'.number_format($nuevo,2);
                    if(strcmp($this->monto,$this->confirmacion)!==0){
                        $this->addError('igual','Los montos no son iguales');
                    }
                }
            }
        }else{           
            $this->addError('letras','El monto aprobar solo permiten numeros');
        }

    }
    public function updatedConfirmacion(){
        $sin = str_replace("$","",$this->confirmacion);
        $nuevo1 = str_replace(",","",$sin);
        if(is_numeric($nuevo1)){
            if($nuevo1>=100000){
                $this->addError('maximo_c','La confirmación no puede superar los $100,000.00');
                $this->confirmacion = '$'.number_format(100000,2);
            }else{
                if($nuevo1<=0){
                    $this->addError('cero_c','El monto confirmación no puede ser menor a 0');
                }else{
                    $this->confirmacion = '$'.number_format($nuevo1,2);
                    if(strcmp($this->monto,$this->confirmacion)!==0){
                        $this->addError('igual','Los montos no son iguales');
                    }
                }
            }
        }else{
            $this->addError('letras_c','El monto confirmación solo permite números');
        }
       
    }
    public function generarnum($id){
        /* Genero el numero de cliente unico en la base de datos */
        do{
            $num_cliente = rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        }while(User::where('num_cliente','=',$num_cliente)->exists()!=FALSE);
        /* Le asigno el numero de cliente al usuario*/
        $this->user->num_cliente = 'NC'.$num_cliente;
        /* User::where('id','=',$id)->update(['num_cliente'=>'NC'.$num_cliente]); */
        //Doy de alta el credito, registro en clientes aceptados
        do{
            $num_credito = rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        }while(Credito::where('num_credito','=',$num_credito)->exists()!=FALSE);
        Credito::create([
            'num_credito' => $num_credito,
            'user_id' => $id,
            'monto_aut' => $this->monto,
            'fecha_inicio' => null,
            'num_pagos' => null,
            'fecha_termino' => null,
            'num_pagos_rest' => null,
            'estado' => 0
        ]);
        //Alta en clientes aceptados
        $date = Carbon::now();
        $date->format('Y-m-d');
        ClientesAceptados::create([
            'user_id' => $id,
            'credito_num' => $num_credito,
            'fecha' =>$date
        ]);

        Solicitud_Credito::where('user_id','=',$id)->delete();
        $this->altaopen($num_cliente);
    }

    public function altaopen($num_cliente){
        
        try{
            $openpay = Openpay::getInstance(env('OPENPAY_MERCHANT_ID'), env('OPENPAY_APP_KEY_PV'));
            $customerData = array(
                'external_id' => 'NC'.$num_cliente,
                'name' => $this->user->nombre,
                'email' => $this->user->email,
                'phone_number' => $this->user->telefono_contacto
            );
            $customer = $openpay->customers->add($customerData);
            sleep(5);
            $customerId = $customer->id;
            $this->user->openpay_id = $customerId;
            $this->user->save();
        }
        catch (OpenpayApiTransactionError $e) {
            $error = "Error de transacción:" .$e->getMessage().", codigo:".$e->getErrorCode();
            $this->addError('openpay',$error);
        } catch (OpenpayApiRequestError $e) {
            $error = "Error de solicitud:" .$e->getMessage().", codigo:".$e->getErrorCode();
            $this->addError('openpay',$error);
        } catch (OpenpayApiConnectionError $e) {
            $error = "Error de conexión:" .$e->getMessage().", codigo:".$e->getErrorCode();
            $this->addError('openpay',$error);
        } catch (OpenpayApiAuthError $e) {
            $error = "Error de autenticación:" .$e->getMessage().", codigo:".$e->getErrorCode();
            $this->addError('openpay',$error);
        } catch (OpenpayApiError $e) {
            $error = "Error de OpenPay:" .$e->getMessage().", codigo:".$e->getErrorCode();
            $this->addError('openpay',$error);
        } catch (Exception $e) {
            $error = "Error general" .$e->getMessage();
            $this->addError('openpay',$error);
        }
        
        
    }

    public function crearcredito($id){
        //Esta funcion es solo para cuando ya tiene el numero de cliente
        //Doy de alta el credito para pasar la solicitud a clientes aceptados
        do{
            $num_credito = rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        }while(Credito::where('num_credito','=',$num_credito)->exists()!=FALSE);
        Credito::create([
            'num_credito' => $num_credito,
            'user_id' => $id,
            'monto_aut' => $this->monto,
            'fecha_inicio' => null,
            'num_pagos' => null,
            'fecha_termino' => null,
            'num_pagos_rest' => null,
            'estado' => 0
        ]);
        $date = Carbon::now();
        $date->format('Y-m-d');
        ClientesAceptados::create([
            'user_id' => $id,
            'credito_num' => $num_credito,
            'fecha' =>$date
        ]);

        CreditoFinalizado::where('user_id','=',$id)->update(['credito_actual'=>1]);

        Solicitud_Credito::where('user_id','=',$id)->delete();
    }
    public function render()
    {    
        return view('livewire.backoffice.acep-solicitud');
    }
    public function clear(){
        $this->reset(['monto','confirmacion']);
    }
}
