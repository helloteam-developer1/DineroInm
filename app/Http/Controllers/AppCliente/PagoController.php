<?php

namespace App\Http\Controllers\AppCliente;

use App\Http\Controllers\Controller;
use App\Models\Buzon;
use App\Models\InformacionPago;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Exception;
use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiAuthError;
use Openpay\Data\OpenpayApiConnectionError;
use Openpay\Data\OpenpayApiError;
use Openpay\Data\OpenpayApiRequestError;
use Openpay\Data\OpenpayApiTransactionError;



use function PHPUnit\Framework\at;

class PagoController extends Controller
{
    public function __construct() {
        $this->middleware('isUser');
    }
    public function delete($id){
        $openpay = Openpay::getInstance(env('OPENPAY_MERCHANT_ID'), env('OPENPAY_APP_KEY_PV'),'MX');
        $customer = $openpay->customers->get($id);
        $customer->delete();
        /* $customer = $openpay->customers->get('auouon49bnqerg0mvjjt');
        $card = $customer->cards->get('k9jhsxkzawtrbvyocs5m');
        $card->delete(); */

    }
    public function store(Request $request){
        try {
            $id = Auth::user()->openpay_id;
            $openpay = Openpay::getInstance(env('OPENPAY_MERCHANT_ID'), env('OPENPAY_APP_KEY_PV'),'MX');
            $cardDataRequest = array(
                'token_id' => $request->token_id,
                'device_session_id' => $request->deviceIdHiddenFieldName
            );
    
            $customer = $openpay->customers->get($id);
            $card = $customer->cards->add($cardDataRequest);

            if($card->holder_name==Auth::user()->nombre){
                $id = Crypt::encrypt($card->id);
                InformacionPago::create(['user_id'=>Auth::user()->id,'data'=>$id]); 
            }else{
                $eliminar = $openpay->cards->get($card->id);
                $eliminar->delete();
            }
            
        } catch (OpenpayApiTransactionError $e) {
            $error = "Error de transacción:" .$e->getMessage().", codigo:".$e->getErrorCode();
            return redirect()->route('dashboard')->with('errorpayment',$error);
        } catch (OpenpayApiRequestError $e) {
            $error = "Error de solicitud:" .$e->getMessage().", codigo:".$e->getErrorCode();
            return redirect()->route('dashboard')->with('errorpayment',$error);
        } catch (OpenpayApiConnectionError $e) {
            $error = "Error de conexión:" .$e->getMessage().", codigo:".$e->getErrorCode();
            return redirect()->route('dashboard')->with('errorpayment',$error);
        } catch (OpenpayApiAuthError $e) {
            $error = "Error de autenticación:" .$e->getMessage().", codigo:".$e->getErrorCode();
            return redirect()->route('dashboard')->with('errorpayment',$error);
        } catch (OpenpayApiError $e) {
            $error = "Error de OpenPay:" .$e->getMessage().", codigo:".$e->getErrorCode();
            return redirect()->route('dashboard')->with('errorpayment',$error);
        } catch (Exception $e) {
            $error = "Error general" .$e->getMessage();
            return redirect()->route('dashboard')->with('errorpayment',$error);
        }
        Buzon::create(['user_id'=>Auth::user()->id,'informacion'=>0]);
        User::where('id','=',Auth::user()->id)->update(['tarjeta_reg'=>'1']);
        return redirect()->route('dashboard')->with('paymentsuccess','Metodo de Pago agregado correctamente!');
    }
  
}
