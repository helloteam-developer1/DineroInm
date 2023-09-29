<div class="payment">
    <div class="payment-cabecera">
        <p class="payment-cabecera-texto">Tarjeta de crédito o débito</p>
    </div>
    <div class="payment-body">
        @if (session('errorpayment'))
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>
                    {{session('errorpayment')}}
                </div>
            </div>
        @endif
        <div class="card">
            <div>
                <p class="payment-titulo">Tarjetas de crédito</p>
                <img class="card-imagen" src="{{asset('img/openpay/cards1.png')}}" >
            </div>
            <div>
                <p class="payment-titulo">Tarjetas de débito</p>
                <img class="card-imagen" src="{{asset('img/openpay/cards2.png')}}">
            </div>
        </div>
        <form action="{{route('pago.store')}}"  class="payment-formulario" id="payment-form" method="POST">
            @csrf
            <input type="hidden" name="token_id" id="token_id">
            <input type="hidden" name="use_card_points" id="use_card_points" value="false">
            <div class="payment-formulario-titular">
                <label class="payment-titulo">Nombre del titular</label>
                <br />
                <input type="text" class="form-control" placeholder="Como aparece en la tarjeta" value="{{Auth::user()->nombre}}" autocomplete="off" data-openpay-card="holder_name" readonly>
            </div>
            <div class="payment-formulario-tarjeta">
                <label class="payment-titulo">Número de tarjeta</label>
                <br />
                <input type="text" class="form-control" autocomplete="off" data-openpay-card="card_number">
            </div>
            <div class="payment-formulario-fecha">
                <label class="payment-titulo">Fecha de expiración</label>
                <div class="payment-formulario-fechaex">
                    <div class="fechaex"><input class="form-control" type="text" placeholder="Mes" data-openpay-card="expiration_month"></div>
                    <div class="fechaex"><input class="form-control" type="text" placeholder="Año" data-openpay-card="expiration_year"></div>
                </div>
            </div>
            <div class="codigo">
                <label class="payment-titulo">Código de seguridad</label>
                <div class="cvv">
                    <input type="number" class="form-control" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2">
                    <img src="{{asset('img/openpay/cvv.png')}}" >
                </div>
                <br />
                <small id="divtarjeta">Todas las tarjetas al momento de guardarse en BBVA Bancomer Openpay <strong>son validadas haciendo una autorización por $10.00 los cuales son devueltos en el momento.</strong> </small>
                <br />
                <a class="payment-submit" id="pay-button">Pagar</a>
            </div>
            
        </form> 
        <div class="alert alert-warning mt-2" role="alert" id="loading-message" style="display: none;">
            Cargando...
        </div>
        <div class="payment-footer">
            <div class="payment-footer-open">
                <p class="payment-footer-text">Transacciones realizadas vía:</p>
                <img class="card-imagen" src="{{asset('img/openpay/openpay.png')}}">
            </div>
            <div class="seguridad">
                <img width="20px" src="{{asset('img/openpay/security.png')}}">
                <p class="payment-footer-text">Tus pagos se realizan de forma segura con encriptación de 256 bits</p>
            </div> 
            
        </div>
    </div>    
</div>