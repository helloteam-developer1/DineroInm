<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiAuthError;
use Openpay\Data\OpenpayApiConnectionError;
use Openpay\Data\OpenpayApiError;
use Openpay\Data\OpenpayApiRequestError;
use Openpay\Data\OpenpayApiTransactionError;


class Documentos extends Component
{
    public $user, $nombre, $numero_tarjeta, $month, $year,$banco,$brand;

    public function mount(User $user)
    {
        $this->user = $user;
    }
    public function render()
    {
        $data = $this->user->informacion_pago;
        if($data!=NULL){
            
            $llave = Crypt::decrypt($data->data);
            try {
                $openpay = Openpay::getInstance(env('OPENPAY_MERCHANT_ID'), env('OPENPAY_APP_KEY_PV'));
                $customer = $openpay->customers->get($this->user->openpay_id);
                $card = $customer->cards->get($llave);
            } catch (OpenpayApiTransactionError $e) {
                $error = "Error de transacción:" . $e->getMessage() . ", codigo:" . $e->getErrorCode();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            } catch (OpenpayApiRequestError $e) {
                $error = "Error de solicitud:" . $e->getMessage() . ", codigo:" . $e->getErrorCode();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            } catch (OpenpayApiConnectionError $e) {
                $error = "Error de conexión:" . $e->getMessage() . ", codigo:" . $e->getErrorCode();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            } catch (OpenpayApiAuthError $e) {
                $error = "Error de autenticación:" . $e->getMessage() . ", codigo:" . $e->getErrorCode();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            } catch (OpenpayApiError $e) {
                $error = "Error de OpenPay:" . $e->getMessage() . ", codigo:" . $e->getErrorCode();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            } catch (Exception $e) {

                $error = "Error general" . $e->getMessage();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            }
            $this->nombre = $card->holder_name;
            $this->year = $card->expiration_year;
            $this->month = $card->expiration_month;
            $this->numero_tarjeta = $card->card_number;
            $this->banco = $card->bank_name;
            $this->brand = $card->brand;
            $data = $this->user->informacion_pago->data;
            $llave = Crypt::decrypt($data);
            try {
                $openpay = Openpay::getInstance(env('OPENPAY_MERCHANT_ID'), env('OPENPAY_APP_KEY_PV'));
                $customer = $openpay->customers->get($this->user->openpay_id);
                $card = $customer->cards->get($llave);
            } catch (OpenpayApiTransactionError $e) {
                $error = "Error de transacción:" . $e->getMessage() . ", codigo:" . $e->getErrorCode();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            } catch (OpenpayApiRequestError $e) {
                $error = "Error de solicitud:" . $e->getMessage() . ", codigo:" . $e->getErrorCode();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            } catch (OpenpayApiConnectionError $e) {
                $error = "Error de conexión:" . $e->getMessage() . ", codigo:" . $e->getErrorCode();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            } catch (OpenpayApiAuthError $e) {
                $error = "Error de autenticación:" . $e->getMessage() . ", codigo:" . $e->getErrorCode();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            } catch (OpenpayApiError $e) {
                $error = "Error de OpenPay:" . $e->getMessage() . ", codigo:" . $e->getErrorCode();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            } catch (Exception $e) {
    
                $error = "Error general" . $e->getMessage();
                return view('livewire.backoffice.documentos',['error'=>$error]);
            }
            $this->nombre = $card->holder_name;
            $this->year = $card->expiration_year;
            $this->month = $card->expiration_month;
            $this->numero_tarjeta = $card->card_number;
            $this->banco = $card->bank_name;
            $this->brand = $card->brand;
            return view('livewire.backoffice.documentos');
        }else{
            return view('livewire.backoffice.documentos');
        }
    }

    public function export($url)
    {
        return Storage::disk('public_posts')->download($url);
    }
}
