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

    // 'accepted' => 'The :attribute must be accepted.',
    // 'active_url' => 'The :attribute is not a valid URL.',
    // 'after' => 'The :attribute must be a date after :date.',
    // 'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    // 'alpha' => 'The :attribute may only contain letters.',
    // 'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    // 'alpha_num' => 'The :attribute may only contain letters and numbers.',
    // 'array' => 'The :attribute must be an array.',
    // 'before' => 'The :attribute must be a date before :date.',
    // 'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    // 'between' => [
    //     'numeric' => 'The :attribute must be between :min and :max.',
    //     'file' => 'The :attribute must be between :min and :max kilobytes.',
    //     'string' => 'The :attribute must be between :min and :max characters.',
    //     'array' => 'The :attribute must have between :min and :max items.',
    // ],

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => ':attribute sólo debe contener letras.',
    'alpha_dash'           => ':attribute sólo debe contener letras, números y guiones.',
    'alpha_num'            => ':attribute sólo debe contener letras y números.',
    'array'                => ':attribute debe ser un conjunto.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => ':attribute tiene que estar entre :min - :max.',
        'file'    => ':attribute debe pesar entre :min - :max kilobytes.',
        'string'  => ':attribute tiene que tener entre :min - :max caracteres.',
        'array'   => ':attribute tiene que tener entre :min - :max ítems.',
    ],

    // 'boolean' => 'The :attribute field must be true or false.',
    // 'confirmed' => 'The :attribute confirmation does not match.',
    // 'date' => 'The :attribute is not a valid date.',
    // 'date_equals' => 'The :attribute must be a date equal to :date.',
    // 'date_format' => 'The :attribute does not match the format :format.',
    // 'different' => 'The :attribute and :other must be different.',
    // 'digits' => 'The :attribute must be :digits digits.',
    // 'digits_between' => 'The :attribute must be between :min and :max digits.',
    // 'dimensions' => 'The :attribute has invalid image dimensions.',
    // 'distinct' => 'The :attribute field has a duplicate value.',
    // 'email' => 'The :attribute must be a valid email address.',
    // 'ends_with' => 'The :attribute must end with one of the following: :values',
    // 'exists' => 'The selected :attribute is invalid.',
    // 'file' => 'The :attribute must be a file.',
    // 'filled' => 'The :attribute field must have a value.',

    'boolean'              => 'El campo :attribute debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_equals'          => ':attribute debe ser una fecha igual a :date.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de la imagen :attribute no son válidas.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => ':attribute no es un correo válido',
    'ends_with'            => 'El campo :attribute debe terminar con uno de los siguientes: :values',
    'exists'               => ':attribute es inválido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',

    // 'gt' => [
    //     'numeric' => 'The :attribute must be greater than :value.',
    //     'file' => 'The :attribute must be greater than :value kilobytes.',
    //     'string' => 'The :attribute must be greater than :value characters.',
    //     'array' => 'The :attribute must have more than :value items.',
    // ],
    // 'gte' => [
    //     'numeric' => 'The :attribute must be greater than or equal :value.',
    //     'file' => 'The :attribute must be greater than or equal :value kilobytes.',
    //     'string' => 'The :attribute must be greater than or equal :value characters.',
    //     'array' => 'The :attribute must have :value items or more.',
    // ],

    'gt' => [
        'numeric' => 'El :attribute debe ser mayor que :value.',
        'file'    => 'El :attribute debe ser mayor que :value kilobytes.',
        'string'  => 'El :attribute debe ser mayor que :value caracteres.',
        'array'   => 'El :attribute debe tener más que :value items.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe ser mayor o igual que :value.',
        'file'    => 'El :attribute debe ser mayor o igual que :value kilobytes.',
        'string'  => 'El :attribute debe ser mayor o igual que :value caracteres.',
        'array'   => 'El :attribute debe tener :value items o más.',
    ],

    // 'image' => 'The :attribute must be an image.',
    // 'in' => 'The selected :attribute is invalid.',
    // 'in_array' => 'The :attribute field does not exist in :other.',
    // 'integer' => 'The :attribute must be an integer.',
    // 'ip' => 'The :attribute must be a valid IP address.',
    // 'ipv4' => 'The :attribute must be a valid IPv4 address.',
    // 'ipv6' => 'The :attribute must be a valid IPv6 address.',
    // 'json' => 'The :attribute must be a valid JSON string.',

    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser un dirección IPv4 válida',
    'ipv6'                 => ':attribute debe ser un dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe tener una cadena JSON válida.',

  
    // 'lt' => [
    //     'numeric' => 'The :attribute must be less than :value.',
    //     'file' => 'The :attribute must be less than :value kilobytes.',
    //     'string' => 'The :attribute must be less than :value characters.',
    //     'array' => 'The :attribute must have less than :value items.',
    // ],
    // 'lte' => [
    //     'numeric' => 'The :attribute must be less than or equal :value.',
    //     'file' => 'The :attribute must be less than or equal :value kilobytes.',
    //     'string' => 'The :attribute must be less than or equal :value characters.',
    //     'array' => 'The :attribute must not have more than :value items.',
    // ],

    'lt' => [
        'numeric' => 'El :attribute debe ser menor que :value.',
        'file'    => 'El :attribute debe ser menor que :value kilobytes.',
        'string'  => 'El :attribute debe ser menor que :value caracteres.',
        'array'   => 'El :attribute debe tener menos que :value items.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor o igual que :value.',
        'file'    => 'El :attribute debe ser menor o igual que :value kilobytes.',
        'string'  => 'El :attribute debe ser menor o igual que :value caracteres.',
        'array'   => 'El :attribute no debe tener más que :value items.',
    ],

    // 'max' => [
    //     'numeric' => 'The :attribute may not be greater than :max.',
    //     'file' => 'The :attribute may not be greater than :max kilobytes.',
    //     'string' => 'The :attribute may not be greater than :max characters.',
    //     'array' => 'The :attribute may not have more than :max items.',
    // ],
    // 'mimes' => 'The :attribute must be a file of type: :values.',
    // 'mimetypes' => 'The :attribute must be a file of type: :values.',
    // 'min' => [
    //     'numeric' => 'The :attribute must be at least :min.',
    //     'file' => 'The :attribute must be at least :min kilobytes.',
    //     'string' => 'The :attribute must be at least :min characters.',
    //     'array' => 'The :attribute must have at least :min items.',
    // ],
    'max' => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file'    => ':attribute no debe ser mayor que :max kilobytes.',
        'string'  => ':attribute no debe ser mayor que :max caracteres.',
        'array'   => ':attribute no debe tener más de :max elementos.',
    ],
    'mimes'       => ':attribute debe ser un archivo con formato: :values.',
    'mimetypes'   => ':attribute debe ser un archivo con formato: :values.',
    'min' => [
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
        'array'   => ':attribute debe tener al menos :min elementos.',
    ],

    // 'not_in' => 'The selected :attribute is invalid.',
    // 'not_regex' => 'The :attribute format is invalid.',
    // 'numeric' => 'The :attribute must be a number.',
    // 'present' => 'The :attribute field must be present.',
    // 'regex' => 'The :attribute format is invalid.',
    // 'required' => 'The :attribute field is required.',
    // 'required_if' => 'The :attribute field is required when :other is :value.',
    // 'required_unless' => 'The :attribute field is required unless :other is in :values.',
    // 'required_with' => 'The :attribute field is required when :values is present.',
    // 'required_with_all' => 'The :attribute field is required when :values are present.',
    // 'required_without' => 'The :attribute field is required when :values is not present.',
    // 'required_without_all' => 'The :attribute field is required when none of :values are present.',
    // 'same' => 'The :attribute and :other must match.',
    // 'size' => [
    //     'numeric' => 'The :attribute must be :size.',
    //     'file' => 'The :attribute must be :size kilobytes.',
    //     'string' => 'The :attribute must be :size characters.',
    //     'array' => 'The :attribute must contain :size items.',
    // ],

    'not_in'               => ':attribute es inválido.',
    'not_regex'            => 'El formato de :attribute es inválido.',
    'numeric'              => ':attribute debe ser numérico.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values estén presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'string'  => ':attribute debe contener :size caracteres.',
        'array'   => ':attribute debe contener :size elementos.',
    ],

    // 'starts_with' => 'The :attribute must start with one of the following: :values',
    // 'string' => 'The :attribute must be a string.',
    // 'timezone' => 'The :attribute must be a valid zone.',
    // 'unique' => 'The :attribute has already been taken.',
    // 'uploaded' => 'The :attribute failed to upload.',
    // 'url' => 'The :attribute format is invalid.',
    // 'uuid' => 'The :attribute must be a valid UUID.',

    'starts_with'          => 'EL :attribute debe empezar con uno de los siguientes: :values',
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => ':attribute ya ha sido registrado.',
    'uploaded'             => 'Subir :attribute ha fallado.',
    'url'                  => 'El formato :attribute es inválido.',
    'uuid'                 => 'EL :attribute debe ser un UUID valido.',

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

    // 'custom' => [
    //     'attribute-name' => [
    //         'rule-name' => 'custom-message',
    //     ],
    // ],

    'custom'               => [
        'password' => [
            'min' => 'La :attribute debe contener más de :min caracteres',
        ],
        'email' => [
            'unique' => 'El :attribute ya ha sido registrado.',
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

    // 'attributes' => [],
    'attributes'           => [
        'name'                  => 'nombre',
        'username'              => 'usuario',
        'email'                 => 'correo electrónico',
        'first_name'            => 'nombre',
        'last_name'             => 'apellido',
        'password'              => 'contraseña',
        'password_confirmation' => 'confirmación de la contraseña',
        'city'                  => 'ciudad',
        'country'               => 'país',
        'address'               => 'dirección',
        'phone'                 => 'teléfono',
        'mobile'                => 'celular',
        'age'                   => 'edad',
        'sex'                   => 'sexo',
        'gender'                => 'género',
        'year'                  => 'año',
        'month'                 => 'mes',
        'day'                   => 'día',
        'hour'                  => 'hora',
        'minute'                => 'minuto',
        'second'                => 'segundo',
        'title'                 => 'título',
        'content'               => 'contenido',
        'body'                  => 'contenido',
        'description'           => 'descripción',
        'excerpt'               => 'extracto',
        'date'                  => 'fecha',
        'time'                  => 'hora',
        'subject'               => 'asunto',
        'message'               => 'mensaje',
        'required'              => 'Requerido',
    ],

];
