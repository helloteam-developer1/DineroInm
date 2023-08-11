<style>
    .btn-verde{
    background-color: #38A937;
    color: #fff;

    }
    @media (max-width: 767px) {
  .icons {
    flex-wrap: wrap;
    justify-content: center;
  }

  .icons img {
    margin: 5px; /* Ajusta el valor según el espaciado deseado entre las imágenes */
  }
  @media (max-width: 767px) {
  .input-group.icons {
    margin-left: -60px;
  }
}

/* Estilos para pantallas más grandes (web) */
@media (min-width: 768px) {
  .input-group.icons {
    margin-left: -40px;
  }}
}
</style>
    <main>
        <div class="mt-1">
            @yield('content')

        </div>
    </main>
    @include('landing.modales.email')
    @yield('modales')

    <x-modal-footer titulo="terminos-condiciones" idm="terminosCondiciones"/>
    <x-modal-footer titulo="quienes-somos" idm="quienesSomos"/>
    <x-modal-footer titulo="acerca-nosotros" idm="acercaNosotros"/>
    <x-modal-footer titulo="politica-privacidad" idm="politicaPrivacidad"/>

    <footer>
        <div class="container grid grid-cols-4 pt-5 pb-3 justify-items-center centerTextMovile">

            {{-- contacto  Mobile --}}

            <div class="grid grid-cols-1 col-span-4 sm:col-span-4 md:col-span-1 lg:col-span-1 xl:col-span-1 my-2 contactMobile block sm:block md:hidden lg:hidden xl:hidden">
                <div>
                    <span class="text-dark font-24"><strong>Cont&aacute;ctanos</strong></span>
                </div>
                <div>

                    <form id="sendContactEmail" data-info="mobile">
                        <div class="max-w-2xl mx-auto">
                            <div class="relative mb-6">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                    </div>
                                    <input type="email" id="emailContact-mobile" class=" text-gray-900 text-sm   focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Correo" required>
                                </div>

                                <div class="flex">
                                    <textarea type="text" id="comentContact-mobile" class="  bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm   p-2.5 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Comentario" required></textarea>
                                </div>
                                <div class="text-right mt-3">
                                    <button type="submit" class="btn w-100 p-2 text-white" style="background: #38A937;"> <strong>Enviar</strong> </button>
                                </div>

                            </div>
                        </form>
                    </div>

            </div>


            <div class="col-span-4 sm:col-span-4 md:col-span-1 lg:col-span-1 xl:col-span-1 my-2 grisd-footer">
                <span class="font-24" style="color: #617E21;"><strong>Informaci&oacute;n legal</strong></span>
                    <div class="text-white">
                        <span data-bs-toggle="modal" data-bs-target="#terminosCondiciones" class="pointer font-24"> Terminos y condiciones </span>
                    </div>
                    <div class="text-white">
                        <span data-bs-toggle="modal" data-bs-target="#politicaPrivacidad" class="pointer font-24"> Pol&iacute;tica y aviso de privacidad </span>
                    </div>
                    <div class="mt-5 " >
                        <span class="text-dark font-24 mb-4" ><strong>¿Te gust&oacute; la p&aacute;gina?</strong></span>
                        <div class="mt-3">

                            <center>
                                <img class="imgManosmobile " src="{{ asset('img/landing/index/Grupo 63.png') }}" width="50%" alt="dislikeAndLike">
                            </center>
                            <img class="imgManosdesk" src="{{ asset('img/landing/index/Grupo 63.png') }}" width="50%" alt="dislikeAndLike">
                        </div>
                    </div>
            </div>
            <div class="col-span-4 sm:col-span-4 md:col-span-1 lg:col-span-1 xl:col-span-1 my-2 grisd-footer">
                <span style="color: #617E21;">
                    <strong class="font-24">Acerca al cliente</strong>
                </span>
                <div class="text-white">
                    <a href="/preguntasfrec" style="color: white"><span class="pointer font-24"> Preguntas Frecuentes</span></a>
                </div>
                <div class="text-white">
                    <span data-bs-toggle="modal" data-bs-target="#quienesSomos" class="pointer font-24"> Qui&eacute;nes somos? </span>
                </div>
                <div class="text-white">
                    <span data-bs-toggle="modal" data-bs-target="#acercaNosotros" class="pointer font-24"> Acerca de nosotros </span>
                </div>

                <div class="mt-5 input-group icons w-full" style= display: flex; align-items: center; justify-content: center;">
                    <div style="display: flex; align-items: center;">
                        <img class="mr-5" src="{{ asset('img/landing/index/Grupo 50.png') }}" width="50">
                        <img src="{{ asset('img/landing/index/Grupo 48.png') }}" width="50">
                    </div>
                </div>

                
            </div>

            {{-- contacto Escritorio --}}
            <div class="col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2 w-100 my-2 hidden sm:hidden md:block lg:block xl:block grisd-footer">
                <form id="sendContactEmail" data-info="desktop">
                        <span class="text-dark font-24 ml-10"><strong>Cont&aacute;ctanos</strong></span>
                        <input hidden id="csrf_token" type="text" value="{{ csrf_token() }}" name="_token">

                        <div class="max-w-2xl mx-auto">
                            <div class="relative mb-6">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                </div>
                                <input type="email" id="emailContact-desktop" class=" inputContact font-24 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Correo" required>
                            </div>

                            <div class="flex">
                                <textarea rows="5" type="text" id="comentContact-desktop" class=" inputContact font-24 rounded-none rounded-r-lg bg-gray-50  text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Comentario" required></textarea>
                            </div>
                            <div class="text-right mt-3">
                                <button class="btn px-5 text-white btn-verde" style=" font-size: 28px"> <strong>Enviar</strong> </button>
                            </div>
                        </div>
                    </form>

            </div>
            <div class="col-span-4 text-white text-center mt-4"> <strong>{{ Date('Y') }} Dinero inmediato | Todos los derechos reservados</strong>
            {{-- <br><strong style="color: white;">Número de avíso de COFEPRIS 2315052002C00837</strong> --}}
    
        </div>
    </footer>
