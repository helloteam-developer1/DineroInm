<div class="">
    <div class="antialiased bg-gray-100 dark-mode:bg-gray-900 ">
    <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 shadow z-40">
        <div x-data="{ open: false }" class="flex flex-col mx-auto md:items-center md:justify-between md:flex-row px-5">
        <div class="flex flex-row items-center justify-between">
            <a href="{{ route('home') }}" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                <img src="{{ asset('img/logo.png')}}" width="120" class="imgLogo my-3">
            </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-10 h-10">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row items-center">
            <a class="px-4  mt-4 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline itemNav" href="{{ route('home') }}">
                <img class=""  src="./public/img/assets/aplicacionCliente/Grupo 946.png" alt="no se encuentra">
                    Mi préstamo
            </a>
            <a class="px-4  mt-4 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline itemNav"  data-bs-toggle="modal" data-bs-target="#acercaNosotros" style="cursor:pointer">
                Notificaciones</a>
            <a class="px-4  mt-4 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline itemNav"  data-bs-toggle="modal" data-bs-target="#acercaNosotros" style="cursor:pointer">Solicitud de nuevo crédito</a>
            <a class="px-4  mt-4 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline itemNav"  data-bs-toggle="modal" data-bs-target="#acercaNosotros" style="cursor:pointer">Documentación e información</a>
            <a class="px-4  mt-4 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline itemNav nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"  data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer">
                <span>Ajustes</span> <img src="{{ asset('img/assets/aplicacionCliente/Grupo 397.png')}}" class="m-1">
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#"><img class="me-2" src="img/Grupo 947.png" alt=""> Mi perfil</a></li>
              <li><a class="dropdown-item" href="clienteMenuAjustesContacto.html"><img class="me-2" src="img/Grupo 950.png" alt=""> Contacto</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#"><img class="me-2" src="img/Grupo 948.png" alt=""> Cerrar Sesión</a></li>
            </ul>
            {{-- <a class="px-4  mt-4 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                <a class="btn btn-outline-secondary itemNav btnLogin" href="{{route('singin')}}" style="margin-top:20px;">Inicio de Sesión</a>
            </a> --}}
            {{-- <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">

                <button class="btn  itemNav solicita">¡Solicita tu pr&eacute;stamo ya!</button>
            </a> --}}

        </nav>
        </div>
    </div>
    </div>
</div>