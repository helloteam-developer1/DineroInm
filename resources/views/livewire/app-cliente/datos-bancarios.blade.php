<style>

    .texto-carotSans--ExtraLight {
        font-family: 'CarotSans-ExtraLight';
        color: #5E6061;
        size:1rem;
    }

   @media (max-width: 767px) {
        .col-sm-4 {
            width: 50%;
            float: left;
        }
        .col-sm-2{
            width: 30%;
        }
    }
    
    @media (min-width: 767px) {
        .form-check {
            margin-left: 180px;
        }
    }

</style>

<div>
<!--Mensajes-->
@if (!empty($mensaje))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{$mensaje}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (!empty($fail))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{$fail}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!--Mensajes-->
<!-- <p class="texto-carotSans--ExtraLight">Para depósito del crédito bancario:</p>-->
<!--<p class="texto-carotSans--ExtraLight">Ingrese sus datos de su cuenta de nómina para depositar su crédito aprobado.</p>-->
<!--<p>Nota: Es importante que la cuenta donde le depositaremos sea su cuenta de nómina.</p>-->



{{--Nombre del titular--}}
<div class="row mb-3 justify-content-center">  
        <label for="inputEmail3" class="col-sm-4 col-form-label fw-bold texto-carotSans--ExtraLight">Nombre del titular</label>
        <div class="col-sm-4">
        <input type="tex" class="form-control" id="inputEmail3" placeholder="Nombre del titular" wire:model="titular" maxlength="35">
        @if ($errors->has('titular'))
            <span class="red">{{$errors->first('titular')}}</span>
        @endif
    </div>
</div>

{{--Numero de cuenta--}}
<div class="row mb-3 justify-content-center">
    <label for="inputEmail3" class="col-sm-4 col-form-label fw-bold texto-carotSans--ExtraLight">Numero de cuenta</label>
    <div class="col-sm-4">
    <input type="number" class="form-control" id="inputEmail3" wire:model="num_cuenta" placeholder="Numero de cuenta" maxlength="20">
    @if ($errors->has('num_cuenta'))
        <span class="red">{{$errors->first('num_cuenta')}}</span>
    @endif

    </div>
</div>

{{--Selección de banco--}}
<div class="row mb-3 justify-content-center">
    <label for="inputEmail3" class="col-sm-4 col-form-label fw-bold texto-carotSans--ExtraLight">Banco</label>
    <div class="col-sm-4">
        <select class="form-select" aria-label="Banco" wire:model="banco">
        <option selected>Selecciona un banco</option>
            @foreach ($bancos as $b)
                <option value="{{$b->name}}">{{$b->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('banco'))
            <span class="red">{{$errors->first('banco')}}</span>
        @endif
    </div>
</div>
{{--Clave Intervancaria--}}
<!--<div class="row mb-3 justify-content-center">-->
<!--    <div class="col-sm-4">-->
<!--    <input type="text" class="form-control" id="inputEmail3" placeholder="Clave interbancaria" wire:model="clave_inter" maxlength="18">-->
<!--    @if ($errors->has('clave_inter'))-->
<!--        <span class="red">{{$errors->first('clave_inter')}}</span>-->
<!--    @endif-->
<!--    </div>-->
<!--</div>-->

{{--Numero de Tarjeta--}}
<!--<div class="row mb-3 justify-content-center">-->
<!--    <div class="col-sm-4">-->
<!--    <input type="text" class="form-control" wire:model="num_tarjeta" id="inputEmail3" placeholder="Numero de tarjeta" maxlength="16">-->
<!--    @if ($errors->has('num_tarjeta'))-->
<!--        <span class="red">{{$errors->first('num_tarjeta')}}</span>-->
<!--    @endif-->
<!--    </div>-->
<!--</div>-->



{{--Fecha de Expiración y codigo de seguridad label--}}
<div class="row mb-3 justify-content-center">
<div class="col-sm-4">
    <label for="inputEmail3" class="col-form-label fw-bold texto-carotSans--ExtraLight">Fecha de expiración</label>
</div>
<div class="col-sm-4">
  
    <label for="inputEmail3" class="col-form-label fw-bold texto-carotSans--ExtraLight">Código de seguridad</label>

</div>
</div>

{{--Fecha de Expiración y codigo de seguridad inputs--}}
<div class="row mb-6 justify-content-center">
<div class="col-sm-2">
    <input type="numeric" placeholder="MM" class="form-control" wire:model="fecha_mm" maxlength="2">
    @if ($errors->has('fecha_mm'))
        <span class="red">{{$errors->first('fecha_mm')}}</span>
    @endif
</div>
<div class="col-sm-2">
    <input type="numeric" placeholder="YY" class="form-control"  wire:model="fecha_yy" maxlength="2">
    @if ($errors->has('fecha_yy'))
        <span class="red">{{$errors->first('fecha_yy')}}</span>
    @endif
</div>
<div class="col-sm-2 d-flex align-items-center">
    <input type="numeric" class="form-control" id="cc-cvv" placeholder="CVV" wire:model="cvv" maxlength="3">
    &nbsp;&nbsp;<img src="../img/Info.svg" class="img-fluid" style="max-width:20%; " alt="Bancos">
    @if ($errors->has('cvv'))
        <span class="red">{{$errors->first('cvv')}}</span>
    @endif
</div>

</div>

<br>

{{--Terminos, Condiciones, Cargo--}}
<div class="row mb-3">
    <div class="col-sm-6">
        <div class="form-check" ">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck1" wire:model="terminos">
            <label class="form-check-label" for="invalidCheck1" texto-carotSans--ExtraLight">Acepto términos y condiciones</label>
            @if ($errors->has('terminos'))
                <span class="red">{{$errors->first('terminos')}}</span>
            @endif
        </div>
        <div class="form-check"">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" wire:model="politicas">
            <label class="form-check-label" for="invalidCheck2" texto-carotSans--ExtraLight">Acepto políticas de privacidad</label>
            @if ($errors->has('politicas'))
                <span class="red">{{$errors->first('politicas')}}</span>
            @endif
        </div>
    </div>
</div>




<div class="row mb-3 d-flex justify-content-center">
    <div class="col-sm-6">
        <p class="text-3xl font-bold text-datgencred text-center" style="color: #F5A733; font-size: 30px;">
            Aceptamos tarjetas
        </p>
    </div>
</div>

<div class="row mb-3 justify-content-center">
    <div class="col-sm-6">
        <img src="{{ asset('img/assets/aplicacionCliente/bancos.png')}}" class="img-fluid" alt="Bancos">
    </div>
</div>
</div>
