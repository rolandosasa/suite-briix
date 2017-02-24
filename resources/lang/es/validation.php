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

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL válida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'alpha'                => 'El campo :attribute sólo debe contener letras.',
    'alpha_dash'           => 'El campo :attribute sólo debe contener letras, números y barras.',
    'alpha_num'            => 'El campo :attribute sólo debe contener letras y números.',
    'array'                => 'El campo :attribute debe ser una lista.',
    'before'               => 'El campo :attribute  debe ser una fecha anterior a :date.',
    'between'              => [
        'numeric' => 'El campo :attribute debe ser un número entre :min y :max.',
        'file'    => 'El campo :attribute debe ser entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe ser entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser booleano.',
    'confirmed'            => 'El campo :attribute de confirmación no coincide.',
    'date'                 => 'El campo :attribute no es una fecha válida.',
    'date_format'          => 'La fecha :attribute debe coincidir con el formato :format.',
    'different'            => 'El campo :attribute y :other deben ser diferentes.',
    'digits'               => 'El número :attribute debe tener :digits dígitos.',
    'digits_between'       => 'El número :attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'El :attribute contiene dimensiones de imagen invalidas.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => 'El campo :attribute debe contener un e-mail válido.',
    'exists'               => 'El campo :attribute seleccionado es inválido.',
    'file'                 => 'El :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'image'                => 'El campo :attribute debe contener una imagen.',
    'in'                   => 'El :attribute seleccionado no es válido.',
    'in_array'             => 'El campo :attribute no existen en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe contener una dirección IP válida.',
    'json'                 => 'El campo :attribute debe contener un JSON válido.',
    'max'                  => [
        'numeric' => 'El número :attribute no debe ser mayor que :max.',
        'file'    => 'El fichero :attribute no debe ser mayor que :max kilobytes.',
        'string'  => 'El texto :attribute debe tener menos de :max caracteres.',
        'array'   => 'La lista :attribute debe contener menos de :max elemnetos.',
    ],
    'mimes'                => 'El fichero :attribute debe tener el formato/s :values.',
    'min'                  => [
        'numeric' => 'El número :attribute debe ser mayor o igual a :min.',
        'file'    => 'El fichero :attribute debe ser mayor o igual a :min kilobytes.',
        'string'  => 'El texto :attribute debe tener, al menos, :min caracteres.',
        'array'   => 'La lista :attribute debe contener, al menos :min elemnetos.',
    ],
    'not_in'               => 'El :attribute seleccionado no es válido.',
    'numeric'              => 'El campo :attribute debe ser un número.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute no es válido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other tiene valor :value.',
    'required_unless'      => 'El campo :attribute es obligatorio, excepto cuando :other esta en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no están presentes.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values están presentes.',
    'same'                 => 'El campo :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El número :attribute debe tener :size caracteres.',
        'file'    => 'El fichero :attribute debe tener :size kilobytes.',
        'string'  => 'El texto :attribute debe tener :size caracteres.',
        'array'   => 'La lista :attribute debe contener :size elemnetos.',
    ],
    'string'               => 'El campo :attribute debe contener texto.',
    'timezone'             => 'El campo :attribute debe contener una zona horaria válida.',
    'unique'               => 'El campo :attribute ya está en uso.',
    'url'                  => 'El enlace :attribute debe tener un formato válido.',

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
            'rule-name' => 'mensaje-personalizado',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'backend' => [
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Roles asociados',
                    'dependencies' => 'Dependencias',
                    'display_name' => 'Nombre a mostrar',
                    'group' => 'Grupo',
                    'group_sort' => 'Orden del Grupo',

                    'groups' => [
                        'name' => 'Nombre del Grupo',
                    ],

                    'name' => 'Nombre',
                    'system' => 'Sistema?',
                ],

                'roles' => [
                    'associated_permissions' => 'Permisos asociados',
                    'name' => 'Nombre',
                    'sort' => 'Orden',
                ],

                'users' => [
                    'active' => 'Activo',
                    'associated_roles' => 'Roles asociados',
                    'confirmed' => 'Confirmado',
                    'email' => 'Dirección de Correo',
                    'name' => 'Nombre',
                    'enterprise' => 'Empresa',
                    'other_permissions' => 'Otros Permisos',
                    'password' => 'Contraseña',
                    'password_confirmation' => 'Confirmación de la Contraseña',
                    'send_confirmation_email' => 'Enviar Correo de confirmación',
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Attributes Fronted
        |--------------------------------------------------------------------------
        */
        'frontend' => [
            'email' => 'Dirección de Correo',
            'name' => 'Nombre',
            'password' => 'Contraseña',
            'password_confirmation' => 'Confirmación de la Contraseña',
            'old_password' => 'Antigua Contraseña',
            'new_password' => 'Nueva Contraseña',
            'new_password_confirmation' => 'Confirmación de la Nueva Contraseña',
        ],

        /*
        |--------------------------------------------------------------------------
        | Attributes Briix
        |--------------------------------------------------------------------------
        */
        'briix' => [
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Roles asociados',
                    'dependencies' => 'Dependencias',
                    'display_name' => 'Nombre a mostrar',
                    'group' => 'Grupo',
                    'group_sort' => 'Orden del Grupo',

                    'groups' => [
                        'name' => 'Nombre del Grupo',
                    ],

                    'name' => 'Nombre',
                    'system' => 'Sistema?',
                ],

                'roles' => [
                    'associated_permissions' => 'Permisos asociados',
                    'name' => 'Nombre',
                    'sort' => 'Orden',
                ],

                'packets' => [
                    'associated_products' => 'Productos asociados',
                    'name' => 'Nombre',
                    'sort' => 'Orden',
                ],

                'users' => [
                    'active' => 'Activo',
                    'associated_roles' => 'Roles asociados',
                    'enterprise_id' => 'Empresa asosiada',
                    'confirmed' => 'Confirmado',
                    'email' => 'Dirección de Correo',
                    'name' => 'Nombre',
                    'enterprise' => 'Empresa',
                    'other_permissions' => 'Otros Permisos',
                    'password' => 'Contraseña',
                    'password_confirmation' => 'Confirmación de la Contraseña',
                    'send_confirmation_email' => 'Enviar Correo de confirmación',
                ],

                'enterprises' => [
                    'associated_permissions' => 'Permisos asociados',
                    'rfc' => 'RFC',
                    'name' => 'Empresa',
                    'address'=>'Dirección',
                    'contact' => 'Contacto',
                    'email' => 'Email',
                    'phone' => 'Telefono',
                    'phone2'=> 'Celular',
                    'sort' => 'Orden',
                ],

                'contracts' => [
                    'enterprise_id'=>'Empresa',
                    'enterprise_id_select'=>'Seleccione Empresa',
                    'client_id' => 'Cliente',
                    'client_id_select'=>'Seleccione usuario por defecto.',
                    'executive_id' => 'Usuario',
                    'quantity' => 'Cantidad',
                    'typePay' => 'Tipo de Pago',
                    'associated_products'=>'Producto o paquete a contratar',
                    'rate_plan_id' => 'Plan Tarifario',
                    'payment_id' => 'Pago',
                    'status' => 'Estatus',
                    'database' => 'Nombre de la Base de Datos',
                    
                ],

                'ratePlans' => [
                    'associated_permissions' => 'Permisos asociados',
                    'description' => 'Descripción',
                    'product' => 'Producto',
                    'cost' => 'Costo',
                ],

                'discountPlans' => [
                    'associated_permissions' => 'Permisos asociados',
                    'product' => 'Producto',
                    'rankStartMonth' => 'Rango inicial de meses',
                    'rankEndMonth' => 'Rango final de meses',
                    'rankStartUser' => 'Rango inicial de usuarios',
                    'rankEndUser' => 'Rango final de usuarios',
                    'status' => 'Estatus',
                    'discount' => 'Descuento',
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Attributes Briix
        |--------------------------------------------------------------------------
        */
        'cmovil' => [
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Roles asociados',
                    'dependencies' => 'Dependencias',
                    'display_name' => 'Nombre a mostrar',
                    'group' => 'Grupo',
                    'group_sort' => 'Orden del Grupo',

                    'groups' => [
                        'name' => 'Nombre del Grupo',
                    ],

                    'name' => 'Nombre',
                    'system' => 'Sistema?',
                ],

                'roles' => [
                    'associated_permissions' => 'Permisos asociados',
                    'name' => 'Nombre',
                    'sort' => 'Orden',
                ],

                'users' => [
                    'active' => 'Activo',
                    'associated_roles' => 'Roles asociados',
                    'enterprise_id' => 'Empresa asosiada',
                    'confirmed' => 'Confirmado',
                    'email' => 'Dirección de Correo',
                    'name' => 'Nombre',
                    'enterprise' => 'Empresa',
                    'other_permissions' => 'Otros Permisos',
                    'password' => 'Contraseña',
                    'password_confirmation' => 'Confirmación de la Contraseña',
                    'send_confirmation_email' => 'Enviar Correo de confirmación',
                ],

                'enterprises' => [
                    'associated_permissions' => 'Permisos asociados',
                    'rfc' => 'RFC',
                    'name' => 'Empresa',
                    'address'=>'Dirección',
                    'contact' => 'Contacto',
                    'email' => 'Email',
                    'phone' => 'Telefono',
                    'phone2'=> 'Celular',
                    'sort' => 'Orden',
                ],

                'lines' => [
                    'associated_permissions' => 'Permisos asociados',
                    'name' => 'Nombre',
                    'user_id'=>'Usuario Asociado',
                    'phone' => 'Telefono',
                    'sort' => 'Orden',
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Attributes Crecursos
        |--------------------------------------------------------------------------
        */
        'crecursos' => [
            'access' => [
                'enterprises' => [
                    'associated_department' => 'Departamentos asociados',
                    'rfc' => 'RFC',
                    'name' => 'Nombre de la Empresa',
                    'email' => 'Email',
                    'phone' => 'Telefono',
                    'address' => 'Dirección',
                    'department' => 'Departamentos',
                ],

                'humanresources' => [
                    'date' => 'Fecha',
                    'department' => 'Departamento',
                    'applicant_name' => 'Nombre del solicitante',
                    'cargo' => 'Puesto ocupado',
                    'reason' => 'Motivo por el cual solicita la vacante',
                    'vacant_name' => 'Nombre de la vacante',
                    'department_a' => 'Departamento',
                    'manager' => 'Nombre del gerente',
                    'position' => 'Cargo',
                    'phone' => 'Telefono',
                    'email' => 'email',
                    // Campos del candidato
                    'genre' => 'Genero',
                    'civil_state' => 'Estado Civil',
                    'level_education' => 'Nivel de educación',
                    'career' => 'Carrera o Area',
                    // Campos de la vacante
                    'quantity' => 'No. de vacantes',
                    'department2' => 'Departamento',
                    'state_id' => 'Estado',
                    'city' => 'Ciudad',
                    'schedule'=> ' Horario',
                    'working_days' => 'Días laborales',
                    'position2' => 'Puesto',
                    'lenguages' => 'Idiomas',
                    'basic_salary' => 'Sueldo base',
                    'overall_salary' => 'Sueldo global ',
                    'age_range' => 'Rango de edad',
                    'description' => 'Descripción del puesto',
                    'status2' => 'Estado de la vacante',
                    'requestv' => 'Agregar requisitos',
                    'nivelreq' => 'Nivel requerido',
                ],

                'days'=> [
                    'monday' => 'L',
                    'tuesday' => 'M',
                    'wednesday' => 'Mi',
                    'thursday'=> 'J',
                    'friday' => 'V',
                    'saturday' => 'S',
                ],

                'department' => [
                    'name_department' => 'Nombre del Departamento',
                    'description' => 'Descripción',
                    'area' => 'Area',
                ],

                'compettition' => [
                    'category' => 'Categoría',
                    'name' =>  'Nombre de la competencia',
                    'type' => 'Tipo',

                ],

                'candidate' => [
                    'namecan' => 'Nombre del candidato',
                    'laveleducation' => 'Nivel de educación',
                    'school' => 'Escuela',
                    'career' => 'Carrera',
                    'identitycard' => 'Cedula Profesional',
                    'curp' => 'Curp',
                    'rfccandidate' => 'RFC',
                    'phonecel' => 'Telefono celular',
                    'phonehome' => 'Telefono de casa',
                    'genrecandidate' => 'Genero',
                    'civilstatecandidate' => 'Estado Civil',
                    'birthday' => 'Fecha de nacimiento',
                    'egacandidate' => 'Edad',
                    'imss' => 'Numero de IMSS',
                    'state' => 'Estado',
                    'citycandidate' => 'Delegacion/municipio',
                    // 'delegation' => 'Ciudad',
                    'colony' => 'Colonia',
                    'address' => 'Dirección',
                    'statuscandidate' => 'Estado',
                    'email' => 'Correo',
                    'applyfor' => 'Solicitado',
                    'category' => 'Categoría',
                    'compettition' => 'Competencia',
                    // 'type' => 'Tipo',
                    'levelReq' => 'Nivel requerido',

                    'applyfortwo' => 'Solicitado',
                    'categorytwo' => 'Categoria',
                    'compettitiontwo' => 'Competencia',
                    // 'typetwo' => 'Tipo',
                    'levelReqtwo' => 'Nivel requerido',

                    'socialnetwork' => 'Red social',
                    'linkp' => 'Link',

                    'enterprises' => 'Empresa',
                    'activity' => 'Actividad',
                    'antiquity' => 'Antigüedad',
                    'salarycan' => 'Salario',
                    'benefits' => 'Monto de prestaciones',
                    'reference' => 'Referencia',
                    'reasonofexit' => 'Motivo de salida',
                ],

                'personal' => [
                    'name' => 'Nombre',
                    'firstlastname' => 'Apellido Paterno',
                    'secondlastname' => 'Apellido Materno',
                    'gender' => 'Genero',
                    'civil-status' => 'Estado Civil',
                    'birthdate' => 'Fecha de Nacimiento',
                    'age' => 'Edad',
                    'birthplace' => 'Lugar de Nacimiento',
                    'address' => 'Dirección',
                    'email' => 'Correo Electrónico',
                    'phone' => 'Teléfono',
                    'photo' => 'Foto',
                    'curp' => 'CURP',
                    'imss' => 'N° Seg. Social',
                    'rfc' => 'RFC',
                    'level-studies' => 'Nivel de Estudios',
                    'school' => 'Escuela',
                    'career' => 'Carrera',
                    'identity-card' => 'Cédula Profesional',
                    'selection' => 'Seleccione',
                ],

                'project' => [
                    'name' => 'Nombre del Proyecto',
                    'description' => 'Descripción',
                    'contract' => 'Empresa Contratista',
                    'date_init' => 'Fecha de Inicio',
                    'date_end' => 'Fecha de Terminación',
                    'total_amount' => 'Monto Total',
                    'advance' => 'Anticipo',
                ],

                'concept' => [
                    'name' => 'Decripción del Concepto',
                ],

                'estimated' => [
                    'time_programmed' => 'Tiempo programado',
                    'time_difference' => 'Tiempo de diferencia',
                    'advance_percent' => 'Porcentaje de avance',
                ],

                'select'=> [
                    'Select' => 'Seleccione',
                ],

                'job' => [
                    'name_jobs'       => 'Nombre del puesto',
                    'department'      => 'Departamento',
                    'immediate_boss'  => 'Jefe inmediato',
                    'supervises'      => 'Supervisa a:',
                    'responsabilities'=> 'Responsabilidades',
                    'job_description' => 'Descripción del puesto',
                    'salary'          => 'Salario base',
                    'salary_g'        => 'Salario global',
                ],
            ],
        ],
    ],

];
