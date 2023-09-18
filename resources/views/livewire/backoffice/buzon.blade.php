<div class="dropdown">
    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
      Buzon
      @if ($notificacion!=0)
        <sup>{{$notificacion}} </sup>
      @endif
      <br>
    </a>
    @if ($notificacion!=0)    
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @foreach ($datos as $d)
                @if ($d->informacion==0)
                    <a href="{{route('masInformacion',$d->user->id)}}">El usuario <strong>{{$d->user->nombre}}</strong>, agrego su metodo de pago</a>
                @else
                    <a href="{{route('masInformacion',$d->user->id)}}">El usuario <strong>{{$d->user->nombre}}</strong>, ha modificado su documentación</a>    
                @endif
                <form method="POST" action="{{route('buzon.eliminar',$d)}}">
                    @method('delete')
                    @csrf
                    <button type="submit">Eliminar</button>
                </form>
            @endforeach
        </ul>
    @else    
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <p>Sin notificaciones</p>
        </ul>
    @endif
  </div>