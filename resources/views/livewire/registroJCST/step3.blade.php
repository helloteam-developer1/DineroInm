<div class="container" style="margin-bottom: 15px; margin-top:15px;">
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-4">
        
        {{-- Inicio del formulario 3 --}}
        <div class="col justify-content-center cont-form-t container-fluid">
            <p class="titulo-naranja">Documentos</p>
            <p class="texto">Para hacer uso de su crédito es importante adjuntar la siguiente documentación:</p>
            <p class="texto-rojo-s">"Recuerda subir tus documentos de la forma más legible posible"</p>
            <p class="texto-negro-s-e">"Los archivos no deben de pesar más de 2 MB."</p>
            <br />
            {{--Alertas de subida de las img--}}
            <div class="row empresa">
                {{--alerta de carga ine frente--}}
                <div wire:loading wire:target="ine_frente" class="bg-[#EAF9EA] text-[#39A935] rounded-b px-4 py-3 shadow-md mb-6" role="alert">
                    <div>
                        <div>
                            <center>
                                <p class="xl:text-lg lg:text-lg md:text-sm text-[#39A935] text-center text-sm">Espera estamos cargando ine frente...</p>
                                <p class="xl:text-sm lg:text-sm md:text-sm text-[#F29100] text-center text-xs">El tiempo de espera dependerá de la velocidad de tu internet.</p>
                            </center>
                        </div>
                    </div>
                </div>
                {{--alerta de carga reverso--}}
                <div wire:loading wire:target="ine_reverso" class="bg-[#EAF9EA] text-[#39A935] rounded-b px-4 py-3 shadow-md mb-6" role="alert">
                    <div>
                        <div>
                            <center>
                                <p class="xl:text-lg lg:text-lg md:text-sm text-[#39A935] text-center text-sm">Espera estamos cargando ine reverso...</p>
                                <p class="xl:text-sm lg:text-sm md:text-sm text-[#F29100] text-center text-xs">El tiempo de espera dependerá de la velocidad de tu internet.</p>
                            </center>
                        </div>
                    </div>
                </div>
                {{--alerta de carga comprobante de docmicilio--}}
                <div wire:loading wire:target="comprobante_domicilio" class="bg-[#EAF9EA] text-[#39A935] rounded-b px-4 py-3 shadow-md mb-6" role="alert">
                    <div>
                        <div>
                            <center>
                                <p class="xl:text-lg lg:text-lg md:text-sm text-[#39A935] text-center text-sm">Espera estamos cargando comprobante de domicilio...</p>
                                <p class="xl:text-sm lg:text-sm md:text-sm text-[#F29100] text-center text-xs">El tiempo de espera dependerá de la velocidad de tu internet.</p>
                            </center>
                        </div>
                    </div>
                </div>
                <div wire:loading wire:target="foto_con_ine" class="bg-[#EAF9EA] text-[#39A935] rounded-b px-4 py-3 shadow-md mb-6" role="alert">
                    <div>
                        <div>
                            <center>
                                <p class="xl:text-lg lg:text-lg md:text-sm text-[#39A935] text-center text-sm">Espera estamos cargando foto con ine...</p>
                                <p class="xl:text-sm lg:text-sm md:text-sm text-[#F29100] text-center text-xs">El tiempo de espera dependerá de la velocidad de tu internet.</p>
                            </center>
                        </div>
                    </div>
                </div>
                {{--alerta de carga foto con ine--}}
                
            </div>
            {{-- Campos para subir datos --}}
            {{--Ine Frente--}}
            <div class="row">
                <div class="col-2">
                    @if ($ine_frente)
                        <img src="{{ $ine_frente->temporaryUrl() }}" width="75%" height="auto" />
                    @endif
                </div>
                <div class="col-5">
                    <p class="texto">INE (frente)</p>
                    @if ($errors->has('ine_frente'))
                    <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('ine_frente') }}</span>
                    @endif
                </div>
                <div class="col-5">
                    <a class="btn btn-gris" onclick="document.getElementById('getFileine_frente').click()">Adjuntar
                        archivo</a>
                    <input type='file' id="getFileine_frente" style="display: none" name="ine_frente"
                        wire:model="ine_frente" accept="image/*" >
                </div>
            </div>
            <br />
            {{--Ine Reverso--}}
            <div class="row">
                <div class="col-2">
                    @if ($ine_reverso)
                        <img src="{{ $ine_reverso->temporaryUrl() }}" width="75%" height="auto" />
                    @endif
                </div>
                <div class="col-5">
                    <p class="texto">INE (reverso)</p>
                    @if ($errors->has('ine_reverso'))
                        <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('ine_reverso') }}</span>
                    @endif
                </div>
                <div class="col-5">
                    <a class="btn btn-gris" onclick="document.getElementById('getFileine_reverso').click()">Adjuntar
                        archivo</a>
                    <input type='file' id="getFileine_reverso" style="display:none" name="ine_reverso"
                        wire:model="ine_reverso" accept="image/*">
                </div>
            </div>
            <br />
            {{--Comprobante de domicilio--}}
            <div class="row">
                <div class="col-2">
                    @if ($comprobante_de_domicilio)
                        <img src="{{ $comprobante_de_domicilio->temporaryUrl() }}" width="75%" height="auto" />
                    @endif
                </div>
                <div class="col-5">
                    <p class="texto">Comprobante de domicilio</p>
                    @if ($errors->has('comprobante_de_domicilio'))
                        <span style="color:brown;text-align:initial; float:left;">{{ $errors->first('comprobante_de_domicilio') }}</span>
                    @endif
                </div>
                <div class="col-5">
                    <a class="btn btn-gris" onclick="document.getElementById('getFilecomp_dom').click()">Adjuntar archivo</a>
                    <input type='file' id="getFilecomp_dom" style="display:none" name="comp_dom"
                        wire:model="comprobante_de_domicilio" accept="image/*">
                </div>
            </div>
            <br />
            {{--Foto con ine --}}
            <div class="row">
                <div class="col-2">
                    @if ($foto_con_ine)
                        <img src="{{ $foto_con_ine->temporaryUrl() }}" width="75%" height="auto" />
                    @endif
                </div>
                <div class="col-5"> 
                    <p class="texto">Tomate una foto con tu INE </p>
                    @if ($errors->has('foto_con_ine'))
                        <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('foto_con_ine') }}</span>
                    @endif
                </div>
                <div class="col-5">
                    <a class="btn btn-gris" onclick="document.getElementById('getFilefoto_cine').click()">Adjuntar
                        archivo</a>
                    <input type='file' id="getFilefoto_cine" style="display:none" name="foto_cine"
                        wire:model="foto_con_ine" accept="image/*">
                </div>
            </div>
            <br />
            {{--fotografia--}}
            <div class="row" >
                <div class="col-3"></div>
                <div class="col-7">
                    <div>
                        <img src="{{ asset('img/landing/index/perfil.png') }}" class="img">
                    </div>
                    <div>
                        <p class="texto-verde-p empresa">La fotografía no debe de ser tomada con: (gorra, lentes o algún objeto
                            viendo a la cámara a qué altura la INE)
                        </p>
                    </div>
                    
                </div>
                <div class="col-1"></div>
            </div>
            {{--Acepto--}}
            <div class="row" >
                <div class="col-2"></div>
                <div class="col-9">
                    
                        <label class="f-label label-ac" for="test">
                            <input class="form-check-input input-ac" type="checkbox" value="" id="test" wire:model="acepto">
                                 Acepto que mi información sea investigada en buro de crédito.
                        </label>
                        
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-9">
                    
                        <p class="acp" for="flexCheckDefault" style="float: left; width:auto;">
                            Al hacer clic en "Continuar", estarás aceptando el 
                        </p>
                    
                </div>
                <div class="col-1"></div>
            
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-9">
                    
                        <span data-bs-toggle="modal" class="link-t" data-bs-target="#politicaPrivacidad" style="float: left; margin-left:1px;">AVISO DE PRIVACIDAD, </span>
                        <span data-bs-toggle="modal" class="link-t-l" data-bs-target="#terminosCondiciones" style="float: left; margin-left:3px;">TÉRMINOS Y CONDICIONES</span>
                    
                        
                            
                            <x-modal-footer titulo="quienes-somos" idm="quienesSomos"/>
                            <x-modal-footer titulo="politica-privacidad" idm="politicaPrivacidad"/>
                </div>
                <div class="col-1"></div>
                @if ($errors->has('acepto'))
                    <span style="color:brown; text-align:center; float:left;">{{ $errors->first('acepto') }}</span>
                @endif
            </div>
            <br />
            {{-- Botones formulario 3 --}}
            
            
            {{--Alerta de carga--}}
            <div class="row">
                <div class="col-12">
                    <div wire:loading wire:target="submitFormsinIMG" class="bg-[#EAF9EA]  text-[#39A935] px-4 py-3" role="alert" style="margin-bottom: 20px">
                        <p class="font-bold">Cargando...</p>
                        <p class="text-sm text-[#F29100]">Esto dependera de la velocidad de tu internet.</p>
                    </div>
                    <div wire:loading wire:target="submitForm" class="bg-[#EAF9EA]  text-[#39A935] px-4 py-3" role="alert" style="margin-bottom: 20px">
                        <p class="font-bold">Cargando...</p>
                        <p class="text-sm text-[#F29100]">Esto dependera de la velocidad de tu internet y el peso de tus img.</p>
                    </div>
                </div>
            </div>
            
            {{--Botones regresa, continuar, con. sin documentación--}}
            <div class="row">
                <div class="d-grid gap-2 d-md-flex botones">
                    <button class="btn btn-reg btn-block" wire:click="back(2)" style="margin-bottom: 10px;">Regresar</button>
                    <button class="btn btn-con-doc btn-block" wire:click="submitFormsinIMG" id="sindoc" style="margin-bottom: 10px;">Continuar sin documentación</button>
                    <button class="btn btn-cont btn-block" wire:click="submitForm" id="condoc" style="margin-bottom: 10px;">Continuar</button>
                </div>
            
            </div>

        </div>

    </div>
</div>




{{-- Ventana modal --}}
@include('livewire/registroJCST/modales/_modal')
