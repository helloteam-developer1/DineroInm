<x-guest-layout>
    <p class="texto-solicita-verde" style="padding-bottom: 25px; padding-top:15px;">Recuperar contraseña</p>
        <center>            
            @if ($errors->any())
                <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" style="margin: 40px;">
                        
                        <center>
                            <h1 class="titulo-modal" id="exampleModalLabel">
                                @error('password')
                                @if ($message=='Todos los campos son obligatorios')
                                    Campos obligatorios
                                @else
                                    Contraseña inválida
                                @endif
                                @enderror
                                @error('token')
                                    Alto!
                                @enderror
                            </h1>
                        </center>
                    
                        <div class="modal-body" >
                            @foreach ($errors->all() as $e)
                                <p>{{$e}}</p>
                            @endforeach
                            <button type="button" data-bs-dismiss="modal" class="btn-verde btn-md" style="margin-top:1rem; background-color: #38A937; padding:9px; width:8.125rem; color:white; font-size:1.1rem; font-weight:600; border-radius:8px;">Cerrar</button>
                        </div>
                    </div>
                    </div>
                </div>
                <script>
                    $( document ).ready(function() {
                        $('#staticBackdrop').modal('toggle')
                    });
                </script>
            @endif
            <div class="row mb-5 w-75">
                <div class="col-2"></div>
                <div class="col-8">
                    <form method="POST" action="{{ route('password.update') }}" >
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div>
                            <x-input id="email" class="form-control" type="hidden" name="email" :value="old('email', $request->email)" required  autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <input id="password" class="form-control"  placeholder="Contraseña nueva" type="password" name="password" required />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <input id="password_confirmation" class="form-control"  placeholder="Confirmar contraseña"
                                                type="password"
                                                name="password_confirmation" required/>
                        </div>
                        
                        <center><button class="btn btn-verde btn-md" style="margin-top: 30px; ">Cambiar password</button></center>
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
        </center>
</x-guest-layout>