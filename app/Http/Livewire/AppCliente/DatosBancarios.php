<?php

namespace App\Http\Livewire\AppCliente;

use App\Models\InformacionPago;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Exception;

use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiAuthError;
use Openpay\Data\OpenpayApiConnectionError;
use Openpay\Data\OpenpayApiError;
use Openpay\Data\OpenpayApiRequestError;
use Openpay\Data\OpenpayApiTransactionError;

class DatosBancarios extends Component
{
    public function render()
    {
        try {$data = InformacionPago::where('user_id',auth()->user()->id)->first();

        $openpay = Openpay::getInstance(env('OPENPAY_MERCHANT_ID'), env('OPENPAY_APP_KEY_PV'),'MX');
        $customer = $openpay->customers->get(Auth::user()->openpay_id);
            
        $des = Crypt::decrypt($data->data);
        $card = $customer->cards->get($des);

        }catch (OpenpayApiTransactionError $e) {
            $error = "codigo de error:".$e->getErrorCode();
            return view('livewire.app-cliente.datos-bancarios',['error'=>$error]);
        } catch (OpenpayApiRequestError $e) {
            $error = "codigo de error:".$e->getErrorCode();
            return view('livewire.app-cliente.datos-bancarios',['error'=>$error]);
        } catch (OpenpayApiConnectionError $e) {
            $error = "codigo de error:".$e->getErrorCode();
            return view('livewire.app-cliente.datos-bancarios',['error'=>$error]);
        } catch (OpenpayApiAuthError $e) {
            $error = "codigo de error:".$e->getErrorCode();
            return view('livewire.app-cliente.datos-bancarios',['error'=>$error]);
        } catch (OpenpayApiError $e) {
            $error = "codigo de error:".$e->getErrorCode();
            return view('livewire.app-cliente.datos-bancarios',['error'=>$error]);
        } catch (Exception $e) {
            $error = "Error general" .$e->getMessage();
            return view('livewire.app-cliente.datos-bancarios',['error'=>$error]);
        }
        

        return view('livewire.app-cliente.datos-bancarios',
        [
            'card_number' => $card->card_number,
            'holder_name' => $card->holder_name,
            'expiration_year' => $card->expiration_year,
            'expiration_month' => $card->expiration_month,
            'bank_name' => $card->bank_name,
            'type' => $card->type
        ]);
        
    }
}
