<div>

    <button class="btn boton-color px-4 mx-4" data-bs-toggle="modal"
        data-bs-target="#Documentos{{ $user->id }}">Ver</button>

    <!--inicio de modal mostrar documento-->
    <div wire:ignore.self class="modal fade" id="Documentos{{ $user->id }}" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 offset-lg-11 offset-md-11 offset-sm-11 offset-11">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body" style="border: none; vertical-align: middle;">
                    <h5 class="modal-title text-center" id="staticBackdropLabel"
                        style="font-size: 35px; color:#38a937;">Documentos {{ $user->nombre }}</h5>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
                                        <table class="table table-striped table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center" style="font-size: 20px">
                                                        Documentos</th>
                                                    <th scope="col" class="text-center" style="font-size: 20px">
                                                        Descargable</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (Route::currentRouteName() !='masInformacion')
                                                    <tr>
                                                        <td class="pt-3" style="font-weight: bold">Datos Bancarios</td>
                                                        <td>
                                                            @empty($user->tarjeta_reg)
                                                                Sin datos
                                                            @else
                                                                {{$user->tarjeta_reg}}
                                                            @endempty
                                                        </td style="text-align: center;">
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td class="pt-3" style="font-weight: bold "">INE frente</td>
                                                    <td style="text-align: center;">
                                                        
                                                        @if (!empty($user->ine_frente))

                                                            <a wire:click="export('{{ $user->ine_frente }}')"
                                                                style="cursor: pointer;">
                                                                <img src="{{ asset('img/backoffices/DESCARGAS.png') }}"
                                                                    width="40" class="" alt="" style="float:center;">
                                                            @else
                                                                <a style="cursor: pointer; ">
                                                                    <img src="{{ asset('img/backoffices/Grupo 444.png') }}"
                                                                        width="40" class="" alt="" style="float:center;">
                                                        @endif
                                                        </a>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pt-3" style="font-weight: bold">INE reverso</td>
                                                    <td>
                                                        @if (!empty($user->ine_reverso))
                                                            <a wire:click="export('{{ $user->ine_reverso }}')"
                                                                style="cursor: pointer;">
                                                                <img src="{{ asset('img/backoffices/DESCARGAS.png') }}"
                                                                    width="40" class="" alt="" style="float:center;">
                                                            @else
                                                                <a style="cursor: pointer;">
                                                                    <img src="{{ asset('img/backoffices/Grupo 444.png') }}"
                                                                        width="40" class="" alt="" style="float:center;">
                                                        @endif
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pt-3" style="font-weight: bold">Comprobante de
                                                        domicilio</td>
                                                    <td>
                                                        @if (!empty($user->comp_dom))
                                                            <a wire:click="export('{{ $user->comp_dom }}')"
                                                                style="cursor: pointer;">
                                                                <img src="{{ asset('img/backoffices/DESCARGAS.png') }}"
                                                                    width="40" class="" alt="" style="float:center;">
                                                            @else
                                                                <a style="cursor: pointer;">
                                                                    <img src="{{ asset('img/backoffices/Grupo 444.png') }}"
                                                                        width="40" class="" alt="" style="float:center;">
                                                        @endif
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pt-3" style="font-weight: bold">Foto con INE</td>
                                                    <td>
                                                        @if (!empty($user->foto_cine))
                                                            <a wire:click="export('{{ $user->foto_cine }}')"
                                                                style="cursor: pointer;">
                                                                <img src="{{ asset('img/backoffices/DESCARGAS.png') }}"
                                                                    width="40" class="" alt="" style="float:center;">
                                                            @else
                                                                <a style="cursor: pointer;">
                                                                    <img src="{{ asset('img/backoffices/Grupo 444.png') }}"
                                                                        width="40" class="" alt="" style="float:center;">
                                                        @endif
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border: none;">
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
                                        <button type="button" class="btn px-4 my-2"
                                            style="background-color: #38a937; color:white; float:left;"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn px-4 my-2"
                                            style="background-color: #f29100; color:white; float:right;" data-bs-dismiss="modal">Volver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--fin de modal mostrar documento-->

</div>
