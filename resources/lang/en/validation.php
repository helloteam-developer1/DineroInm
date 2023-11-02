<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'active_url' => 'El campo :attribute no es una URL válida.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El campo :attribute solamente puede contener letras.',
    'alpha_dash' => 'El campo :attribute solamente puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El campo :attribute solamente puede contener letras y números.',
    'array' => 'El campo :attribute debe ser un arreglo.',
    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El campo :attribute debe estar entre :min y :max.',
        'file' => 'El campo :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El campo :attribute debe tener entre :min y :max caracteres.',
        'array' => 'El campo :attribute debe tener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo :attribute debe ser falso o verdadero.',
    'confirmed' => 'El campo de confirmación :attribute no coincide.',
    'date' => 'El campo :attribute no es una fecha válida.',
    'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El campo :attribute no coincide con el formato :format.',
    'different' => 'El campo :attribute y :other deben ser diferentes.',
    'digits' => 'El campo :attribute debe tener :digits dígitos.',
    'digits_between' => 'El campo :attribute debe estar entre :min y :max dígitos.',
    'dimensions' => 'El campo :attribute tiene dimensiones de imagen inválidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => 'El campo :attribute debe ser un correo electrónico válido.',
    'exists' => 'El campo seleccionado :attribute es inválido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'file' => 'El campo :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El campo :attribute debe ser mayor que :value caracteres.',
        'array' => 'El campo :atributo debe tener más de :elementos de valor.',
    ],
    'gte' => [
        'numeric' => 'El campo :attribute debe ser mayor que or equal :value.',
        'file' => 'El campo :attribute debe ser mayor que or equal :value kilobytes.',
        'string' => 'El campo :attribute debe ser mayor que or equal :value caracteres.',
        'array' => 'El campo :atributo debe tener :elementos de valor o más.',
    ],
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El campo seleccionado :attribute es inválido.',
    'in_array' => 'El campo :attribute field does not exist in :other.',
    'integer' => 'El campo :el atributo debe ser un entero.',
    'ip' => 'El campo: el atributo debe ser una dirección IP válida.',
    'ipv4' => 'El campo: el atributo debe ser una dirección IPv4 válida.',
    'ipv6' => 'El campo: el atributo debe ser una dirección IPv6 válida.',
    'json' => 'El campo: el atributo debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El campo :atributo debe ser menor que :valor.',
        'file' => 'El campo :atributo debe ser menor que :valor kilobytes.',
        'string' => 'El campo :atributo debe ser menor que :valor caracteres.',
        'array' => 'El campo :atributo debe tener menos de :elementos de valor.',
    ],
    'lte' => [
        'numeric' => 'El campo :atributo debe ser menor o igual a :valor.',
        'file' => 'El campo :atributo debe ser menor o igual a :valor kilobytes.',
        'string' => 'El campo :atributo debe ser menor o igual a :valor caracteres.',
        'array' => 'El campo :atributo no debe tener más de :elementos de valor.',
    ],
    'max' => [
        'numeric' => 'El campo :attribute no debería ser más grande que :max.',
        'file' => 'El campo :attribute no debería pesar más de :max kilobytes.',
        'string' => 'El campo :attribute no debería tener más de :max caracteres.',
        'array' => 'El campo :attribute no debería tener más de :max elementos.',
    ],
    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El campo :attribute debe ser por lo menos :min.',
        'file' => 'El campo :attribute debe ser por lo menos :min kilobytes.',
        'string' => 'El campo :attribute debe ser por lo menos :min caracteres.',
        'array' => 'El campo :attribute debe tener al menos :min items.',
    ],
    'not_in' => 'El campo seleccionado :attribute es inválido.',
    'not_regex' => 'El formato de :attribute es inválido.',
    'numeric' => 'El campo :attribute debe ser numérico',
    'present' => 'El campo :attribute field debe estar presente.',
    'regex' => 'El campo :attribute formato es inválido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo :attribute es obligatorio al menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los valores: :values está presente.',
    'same' => 'El campo :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El campo :attribute debe ser por lo menos :size.',
        'file' => 'El campo :attribute debe ser por lo menos :size kilobytes.',
        'string' => 'El campo :attribute debe ser por lo menos :size caracteres.',
        'array' => 'El campo :attribute debe contener :size elementos.',
    ],
    'starts_with' => 'El campo :attribute con uno de los siguientes valores: :values',
    'string' => 'El campo :attribute debe ser una cadena.',
    'timezone' => 'El campo :attribute debe ser una zona horaria válida.',
    'unique' => 'El campo :attribute ya existe.',
    'uploaded' => 'Hubo un problema al subir la imagen :attribute, revisa tu conexión o que el peso de tus imagenes no rebase de 2MB.',
    'url' => 'El formato de :attribute es inválido.',
    'uuid' => 'El campo :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    
    'attributes' => [
        'num_credito' => 'Número de crédito',
        'num_pagos' => 'Número de pago',
        'interes_anual' => 'Interes Anual',
        'prox_pago' => 'Proximo pago',
        'pago_capital' => 'Pago capital',
        'interes_o' => 'Interes Ordinario',
        'iva_io' => 'IVA Interes Ordinario',
        'comisiones' => 'Comisiones',
        'pago_t_mensual' => 'Pago total mensual',
        'n_credito' => 'Número de Crédito',
        'numero_pagos' => 'Número de pago',
        'fecha_pago' => 'Fecha de pago',
        'monto_pago' => 'Monto pago',
        'p_actual' => 'Contraseña actual',
        'password' => 'Contraseña',
        'password_confirmation' => 'Confirmación de contraseña',
        'termino' => 'busqueda',
        'The card was declined by the bank' => 'La tarjeta ha sido declinada por el banco.',
        'kilobytes' => 'MB',
        'ine_frente' => 'INE frente',
        'ine_reverso' => 'INE reverso',
        'comp_dom' => 'Comprobante de domicilio',
        'foto_cine' =>'Foto con INE'
    ],

];
