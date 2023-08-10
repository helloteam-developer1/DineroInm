@extends('backoffices.layouts.basesinmenu')
@section('titulo','Mi pérfil')
@section('icono')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/backoffices/ICONO_PERFIL.svg') }}">
@endsection

@section('subtitulo', 'Mi pérfil')


@section('contenido')
    @if (session('status'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Cambio con exito!',
            showConfirmButton: false,
            timer: 1900
        });
    </script>
    @endif
   
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                
                <div class="row">
                    <div class="col-10 col-sm-8 col-md-8 col-lg-6 offset-1 offset-sm-2 offset-md-2 offset-lg-3">
                        
                        @if(session('error_perfil'))
                            <script>
                                Swal.fire(
                                'Contraña actual.',
                                'La contraseña actual es incorrecta',
                                'error'
                                );
                            </script>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-exclamation"></i><strong style="margin-left: 5px;">{{session('error_perfil')}}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="col-10 col-sm-10 col-md-8 col-lg-6 offset-1 offset-sm-1 offset-md-2 offset-lg-3">
                            <form action="{{route('perfil.store',Auth::user()->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-5">
                                    <div class="mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
                                        <input type="text" class="form-control fw-light" value="{{old('nombre',Auth::user()->nombre)}}" name="nombre" 
                                        >
                                        @error('nombre')
                                        <span style="color:red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" class="form-control fw-light" placeholder="Contraseña actual" name="p_actual">
                                        @error('p_actual')
                                            <span style="color:red;">{{$message}}</span>
                                        @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" class="form-control fw-light" placeholder="Nueva Contraseña" name="password">
                                            @error('password')
                                                @if ($message=='El campo confirmación de Contraseña no coincide.')
                                                    
                                                @else
                                                    <span style="color:red;">{{$message}}</span>
                                                @endif
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" class="form-control fw-light"  placeholder="Verifique su nueva contraseña" name="password_confirmation">
                                            @error('password_confirmation')
                                                <span style="color:red;">{{$message}}</span>
                                            @enderror
                                            @if ($errors->has('password'))
                                                @if($errors->first('password')=='El campo confirmación de Contraseña no coincide.')
                                                    <span style="color:red;">El campo confirmación de Contraseña no coincide.</span>
                                                @endif
                                            @endif
                                            
                                        </div>
                                        
                                    
                                    <div class="div-confirmar">
                                        <input type="submit" value="Confirmar" class="btn-confirmar">
                                    </div>    
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
