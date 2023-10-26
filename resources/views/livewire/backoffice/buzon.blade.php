<div class="dropdown">
    <a class="nav-link" style="text-decoration: none;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('img/backoffices/BUZ_GRIS.png') }}" width="20"
        alt="CLIENTES"> &nbsp;Buzón
      @if ($notificacion!=0)
        <sup>{{$notificacion}} </sup>
      @endif
      <br>
    </a>
    @if ($notificacion!=0)    
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @foreach ($datos as $d)
                @if ($d->informacion==0)
                    <a style="color: #474747; text-decoration: none; text-align:justify;" href="{{route('masInformacion',$d->user->id)}}">El usuario <strong>{{$d->user->nombre}}</strong>, agregó su método de pago</a>
                @else
                    <a style="color: #474747; text-decoration:none; text-align:justify;" href="{{route('masInformacion',$d->user->id)}}">El usuario <strong>{{$d->user->nombre}}</strong>, ha modificado su documentación</a>    
                @endif
                <form method="POST" action="{{route('buzon.eliminar',$d)}}">
                    @method('delete')
                    @csrf
                    <div style="display: flex; justify-content:center; align-items:center;">
                        <button class="boton-color rounded" type="submit" style="background-color: #38A937; color:#FAFAFA">Eliminar</button>
                    </div>
                </form>
            @endforeach
        </ul>
    @else    
        <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
            <li>
                <p>Sin notificaciones</p>
            </li>
        </ul>
    @endif
  </div>