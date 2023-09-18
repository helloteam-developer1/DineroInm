<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    <div>
        {{session('mensaje')}}
        @switch(session('codigo'))
            @case(1000)
                <small>Error interno del servidor, póngase en contacto con el soporte</small>
                @break
            @case(1001)
                <small>Solicitud incorrecta</small>
                @break
            @case(1002)
                <small>La clave API o la identificación del comerciante no son válidas</small>
                @break
            @case(1003)
                <small>Los parámetros parecen válidos pero la solicitud falló</small>
                @break
            @case(1004)
                <small>El recurso no está disponible en este momento. Por favor, inténtelo de nuevo más tarde</small>
                @break
            @case(1005)
                <small>El recurso solicitado no existe</small>
                @break
            @case(1006)
                <small>El order_id ya ha sido procesado</small>
                @break
            @case(1007)
                <small>Operación rechazada por el procesador</small>
                @break
            @case(1008)
                <small>La cuenta esta inactiva</small>
                @break
            @case(1009)
                <small>La solicitud es demasiado grande.</small>
                @break
            @case(1010)
                <small>Método no permitido para clave API pública; utilice clave privada en su lugar</small>
                @break
            @case(1011)
                <small>El recurso fue eliminado previamente.</small>
                @break
            @case(1012)
                <small>El monto de la transacción excede el límite de transacción permitido</small>
                @break
            @case(1013)
                <small>La operación no está permitida en el recurso.</small>
                @break
            @case(1014)
                <small>Tu cuenta está inactiva, por favor contacta a soporte@openpay.mx para más información</small>
                @break
            @case(1015)
                <small>No se pudo obtener ninguna respuesta de la puerta de enlace. Por favor, inténtelo de nuevo más tarde</small>
                @break
            @case(1016)
                <small>El correo electrónico del comerciante ya ha sido procesado.</small>
                @break
            @case(1017)
                <small>La pasarela de pago no está disponible en este momento, inténtalo de nuevo más tarde</small>
                @break
            @case(1018)
                <small>
                    El número de reintentos de carga es mayor al permitido.</small>
                @break
            @case(1020)
                <small>El número de dígitos decimales no es válido para esta moneda.</small>
                @break
            @case(1023)
                <small>Las transacciones incluidas en su paquete se han completado. Para contratar otro paquete contacta a support@openpay.mx</small>
                @break
            @case(1024)
                <small>El monto de la transacción excede su límite de transacciones permitido por TPV</small>
                @break
            @case(1025)
                <small>Las transacciones CoDi contratadas en tu plan han sido bloqueadas</small>
            @break
            @case(2001)
                <small>La cuenta bancaria ya existe</small>
            @break
            @case(2003)
                <small>El external_id ya existe</small>
            @break
            @case(2004)
                <small>El dígito de verificación del número de tarjeta no es válido</small>
            @break
            @case(2005)
                <small>La fecha de vencimiento ha expirado.</small>
            @break
            @case(2006)
                <small>Se requiere el código de seguridad CVV2</small>
            @break
            @case(2007)
                <small>El número de tarjeta solo es válido en sandbox</small>
            @break
            @case(2008)
                <small>La tarjeta no es válida para puntos.</small>
            @break
            @case(2009)
                <small>El código de seguridad CVV2 no es válido</small>
            @break
            @case(2010)
                <small>Error de autenticación 3D Secure</small>
            @break
            @case(2011)
                <small>Tipo de producto de tarjeta no compatible</small>
            @break
            @case(3001)
                <small>La tarjeta fue rechazada por el banco</small>
            @break
            @case(3002)
                <small>La tarjeta ha caducado</small>
            @break
            @case(3003)
                <small>La tarjeta no tiene fondos suficientes</small>
            @break
            @case(3004)
                <small>La tarjeta fue reportada como robada.</small>
            @break
            @case(3005)
                <small>Riesgo de fraude detectado por el sistema antifraude <br /> Encontrado en la lista negra</small>
            @break
            @case(3006)
                <small>Solicitud no permitida</small>
            @break
            @case(3009)
                <small>La tarjeta fue reportada como perdida</small>
            @break
            @case(3010)
                <small>El banco ha restringido la tarjeta.</small>
            @break
            @case(3011)
                <small>El banco ha solicitado la retención de la tarjeta</small>
            @break
            @case(3012)
                <small>Se requiere autorización bancaria para este cargo</small>
            @break
            @case(3201)
                <small>Comerciante no autorizado a utilizar el plan de pago</small>
            @break
            @case(3203)
                <small>Promoción no válida para ese tipo de tarjeta</small>
            @break
            @case(3204)
                <small>El monto de la transacción es inferior al mínimo para la promoción.</small>
            @break
            @case(3205)
                <small>Promoción no permitida</small>
            @break
            @case(4001)
                <small>No hay fondos suficientes en la cuenta openpay</small>
            @break
            @case(4002)
                <small>La operación no se podrá completar hasta que se paguen las tarifas pendientes</small>
            @break
            @case(6001)
                <small>El webhook ya ha sido procesado</small>
            @break
            @case(6002)
                <small>No se pudo conectar con el servicio webhook, verificar la URL</small>
            @break
            @case(6003)
                <small>El servicio respondió con un error en este momento. Por favor, inténtelo de nuevo más tarde</small>
            @break
            @default
                <p>Por favor, contacta a soporte técnico</p>
        @endswitch
    </div>
</div>