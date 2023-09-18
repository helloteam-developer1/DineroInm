@extends('backoffices.layouts.basesinmenu')
@section('titulo','Cobros')
@section('contenido')
@push('js')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.openpay.mx/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://js.openpay.mx/openpay-data.v1.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
            OpenPay.setId('{{env('OPENPAY_MERCHANT_ID')}}');
            OpenPay.setApiKey('{{env('OPENPAY_APP_KEY_PC')}}');
            OpenPay.setSandboxMode(true);
            //Se genera el id de dispositivo
            var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
            
          

            

        });
       </script>
@endpush
<style>
  .error{
    color:red;
    font-weight: 600;
    padding: 3px;
  }
</style>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <h1 class="text-center my-2">Cobro</h1>
            <form action="{{route('cobros.store')}}" method="POST" id="payment-form">
                @csrf
                <input type="hidden" name="id" value="{{$pago[0]->id_amortizacion}}"> 
                @error('id')
                  <span>{{$message}}</span>
                @enderror
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Nombre del Cliente</label>
                    <input class="form-control" type="text" name="nombre" value="{{$pago[0]->credito->usuario->nombre}}" readonly>
                    @error('nombre')
                      <small class="error">{{$message}}</small>  
                    @enderror
                </div>
                <div class="form-group mb-2">
                  <label for="exampleInputPassword1">Numero de Credito</label>
                  <input type="text" name="num_credito" class="form-control" value="{{$pago[0]->credito->num_credito}}" readonly>
                  @error('num_credito')
                      <small class="error">{{$message}}</small>  
                  @enderror
                </div>
                <div class="form-group mb-2">
                  <label class="form-check-label" for="exampleCheck1">Monto a Cobrar</label>
                  <input type="text" class="form-control" value="{{$pago[0]->pago_total_men}}" readonly>
                </div>
                <div class="form-group mb-2">
                  <label class="form-check-label" for="exampleCheck1">Telefono de Contacto</label>
                  <input type="text" name="telefono" class="form-control" value="{{$pago[0]->credito->usuario->telefono_contacto}}" readonly>
                  @error('telefono')
                    <small class="error">{{$message}}</small>  
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="form-check-label" for="exampleCheck1">Email</label>
                  <input type="text" name="email" class="form-control" value="{{$pago[0]->credito->usuario->email}}" readonly>
                  @error('email')
                    <small class="error">{{$message}}</small>  
                  @enderror
                </div>
                <center>
                    <input type="submit" value="Cobrar" class="btn boton-color px-2 rounded">
                </center>
            </form>
        </div>
        <div class="col"></div>
    </div>
    
</div>
        
@endsection