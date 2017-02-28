<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */
    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Crear Rol',
                'edit' => 'Modificar Rol',
                'management' => 'Administración de Roles',

                'table' => [
                    'number_of_users' => 'Número de Usuarios',
                    'permissions' => 'Permisos',
                    'role' => 'Rol',
                    'sort' => 'Orden',
                    'total' => 'Todos los Roles',
                ],
            ],

            'users' => [
                'active' => 'Usuarios activos',
                'all_permissions' => 'Todos los Permisos',
                'change_password' => 'Cambiar la contraseña',
                'change_password_for' => 'Cambiar la contraseña para :user',
                'create' => 'Crear Usuario',
                'deactivated' => 'Usuarios desactivados',
                'deleted' => 'Usuarios eliminados',
                'edit' => 'Modificar Usuario',
                'management' => 'Administración de Usuarios',
                'no_permissions' => 'Sin Permisos',
                'no_roles' => 'No hay Roles disponibles.',
                'permissions' => 'Permisos',

                'table' => [
                    'confirmed' => 'Confirmado',
                    'created' => 'Creado',
                    'email' => 'Correo',
                    'id' => 'ID',
                    'last_updated' => 'Última modificación',
                    'name' => 'Nombre',
                    'no_deactivated' => 'Ningún Usuario desactivado disponible',
                    'no_deleted' => 'Ningún Usuario eliminado disponible',
                    'roles' => 'Roles',
                    'total' => 'Todos los Usuarios',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Labels Frontend
    |--------------------------------------------------------------------------
    */
    'frontend' => [
        'auth' => [
            'login_box_title' => 'Iniciar Sesión',
            'login_button' => 'Iniciar Sesión',
            'login_with' => 'Iniciar Sesión mediante :social_media',
            'register_box_title' => 'Registrarse',
            'register_button' => 'Registrarse',
            'remember_me' => 'Recordarme',
        ],

        'passwords' => [
            'forgot_password' => 'Se ha olvidado la contraseña?',
            'reset_password_box_title' => 'Reiniciar contraseña',
            'reset_password_button' => 'Reiniciar contraseña',
            'send_password_reset_link_button' => 'Enviar el correo de verificación',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Código Alfa de País',
                'alpha2' => 'Código Alfa 2 de País',
                'alpha3' => 'Código Alfa 3 de País',
                'numeric' => 'Código Numérico de País',
            ],

            'macro_examples' => 'Productos de Briix',

            'state' => [
                'mexico' => 'Listado de Estados de México',
                'us' => [
                    'us' => 'Estados Unidos',
                    'outlying' => 'Territorios Periféricos de Estados Unidos',
                    'armed' => 'Fuerzas Armadas de Estados Unidos',
                ],
            ],

            'territories' => [
                'canada' => 'Listado de Provincias y Territorios de Canada',
            ],

            'timezone' => 'Zonas horarias',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Cambiar la contraseña',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Creado el',
                'edit_information' => 'Modificar la información',
                'email' => 'Correo',
                'last_updated' => 'Última modificación',
                'name' => 'Nombre',
                'update_information' => 'Actualizar la información',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Labels General
    |--------------------------------------------------------------------------
    */
    'general' => [
        'all' => 'Todos',
        'yes' => 'Sí',
        'no' => 'No',
        'custom' => 'Personalizado',
        'actions' => 'Acciones',
        'buttons' => [
            'save' => 'Guardar',
            'update' => 'Actualizar',
        ],
        'hide' => 'Ocultar',
        'none' => 'Ningúno',
        'show' => 'Mostrar',
        'toggle_navigation' => 'Abrir/Cerrar menú de navegación',
    ],

    /*
    |--------------------------------------------------------------------------
    | Labels Briix
    |--------------------------------------------------------------------------
    */
    'briix' => [
        'access' => [
            'roles' => [
                'create' => 'Crear Rol',
                'edit' => 'Modificar Rol',
                'management' => 'Administración de Roles',

                'table' => [
                    'number_of_users' => 'Número de Usuarios',
                    'permissions' => 'Productos',
                    'role' => 'Rol',
                    'sort' => 'Orden',
                    'total' => 'Todos los Roles',
                ],
            ],

            'packets' => [
                'create' => 'Crear Paquete',
                'edit' => 'Modificar Paquete',
                'management' => 'Administración de Paquetes',

                'table' => [
                    'packet' => 'Paquete',
                    'number_of_contracts' => 'Número de Clientes',
                    'products' => 'Productos',
                    'plan' => 'Paquete',
                    'sort' => 'Orden',
                    'total' => 'Todos los pacquetes',
                ],
            ],

            'users' => [
                'active' => 'Usuarios activos',
                'all_permissions' => 'Todos los Permisos',
                'change_password' => 'Cambiar la contraseña',
                'change_password_for' => 'Cambiar la contraseña para :user',
                'create' => 'Crear Usuario',
                'deactivated' => 'Usuarios desactivados',
                'deleted' => 'Usuarios eliminados',
                'edit' => 'Modificar Usuario',
                'management' => 'Administración de Usuarios',
                'no_permissions' => 'Sin Permisos',
                'no_roles' => 'No hay Roles disponibles.',
                'permissions' => 'Permisos',

                'table' => [
                    'confirmed' => 'Confirmado',
                    'created' => 'Creado',
                    'enterprise' => 'Empresa',
                    'email' => 'Correo',
                    'id' => 'ID',
                    'last_updated' => 'Última modificación',
                    'name' => 'Nombre',
                    'no_deactivated' => 'Ningún Usuario desactivado disponible',
                    'no_deleted' => 'Ningún Usuario eliminado disponible',
                    'roles' => 'Roles',
                    'total' => 'Todos los Usuarios',
                ],
            ],

            'enterprises' => [
                'create' => 'Crear Empresa',
                'edit' => 'Modificar Empresa',
                'management' => 'Administración de Empresa',
                'deleted' => 'Empresas eliminadas',

                'table' => [
                    'contact' => 'Contacto',
                    'email' => 'Email de la Empresa',
                    'enterprise' => 'Empresa',
                    'phone' => 'Telefono',
                    'rfc' => 'RFC de la Empresa',
                    'confirmed' => 'Confirmado',
                    'created' => 'Creado',
                    'id' => 'ID',
                    'last_updated' => 'Última modificación',
                    'no_deactivated' => 'Ningún Usuario desactivado disponible',
                    'no_deleted' => 'Ningún Usuario eliminado disponible',
                    'total' => 'Todas las Empresas',
                ],
            ],

            'contracts' => [
                'create' => 'Crear Contrato',
                'edit' => 'Modificar Contrato',
                'management' => 'Administración de Contrato',
                'deleted' => 'Contratos eliminados',
                'all_products'=>'Todos los productos',
                    'products'=>'Producto',

                'table' => [
                    'client_id' => 'Cliente',
                    'executive_id' => 'Usuario',
                    'quantity' => 'Cantidad',
                    'typePay' => 'Tipo de Pago',
                    'rate_plan_id' => 'Plan Tarifario',
                    'payment_id' => 'Pago',
                    'status' => 'Estatus',
                    'permissions' => 'Permisos',
                    'created_at' => 'Creación',
                    'deleted_at' => 'Última eliminación',
                    'updated_at' => 'Última modificación',
                    'id' => 'ID',
                    'last_updated' => 'Última modificación',
                    'no_deactivated' => 'Ningún Contrato desactivado disponible',
                    'no_deleted' => 'Ningún Contrato eliminado disponible',
                ],
            ],

            'ratePlans' => [
                'create' => 'Crear tipos de licencia',
                'edit' => 'Modificar tipos de licencia',
                'management' => 'Administración de tipos de licencia',
                'deleted' => 'Tipos de licencias eliminadas',

                'table' => [
                    'description' => 'Descripcion',
                    'product' => 'Producto',
                    'cost' => 'Costo',
                    'created' => 'Creado',
                    'created_at' => 'Creación',
                    'deleted_at' => 'Última eliminación',
                    'updated_at' => 'Última modificación',
                    'id' => 'ID',
                    'last_updated' => 'Última modificación',
                    'no_deactivated' => 'Ningún Plan Tarifario desactivado disponible',
                    'no_deleted' => 'Ningún tipo de licencia eliminado disponible',
                    'total' => 'Todas de los tipos de licencia',
                ],
            ],

            'discountPlans' => [
                'create' => 'Crear plan de descuento',
                'edit' => 'Modificar plan de descuentos',
                'management' => 'Administración plan de descuentos',
                'deleted' => 'Plan de descuentos eliminadas',

                'table' => [
                    'product' => 'Producto',
                    'rankStartMonth' => 'Rango inicial de mes',
                    'rankEndMonth' => 'Rango final de mes',
                    'rankStartEndMonth' => 'Rango Mes(es)',
                    'rankStartUser' => 'Rango inicial de usuarios',
                    'rankEndUser' => 'Rango final de usuarios',
                    'rankStartEndUser' => 'Rango Usuarios(s)',
                    'status' => 'Estatus',
                    'discount' => 'Descuento',
                    'created' => 'Creado',
                    'created_at' => 'Creación',
                    'deleted_at' => 'Última eliminación',
                    'updated_at' => 'Última modificación',
                    'id' => 'ID',
                    'last_updated' => 'Última modificación',
                    'no_deactivated' => 'Ningún Plan de descuento desactivado disponible',
                    'no_deleted' => 'Ningún plan de descuento eliminado disponible',
                    'total' => 'Todas de los planes de descuento',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Labels Cmovil
    |--------------------------------------------------------------------------
    */
    'cmovil' => [
        'access' => [
            'roles' => [
                'create' => 'Crear Rol',
                'edit' => 'Modificar Rol',
                'management' => 'Administración de Roles',

                'table' => [
                    'number_of_users' => 'Número de Usuarios',
                    'permissions' => 'Productos',
                    'role' => 'Rol',
                    'sort' => 'Orden',
                    'total' => 'Todos los Roles',
                ],
            ],

            'users' => [
                'active' => 'Usuarios activos',
                'all_permissions' => 'Todos los Permisos',
                'change_password' => 'Cambiar la contraseña',
                'change_password_for' => 'Cambiar la contraseña para :user',
                'create' => 'Crear Usuario',
                'deactivated' => 'Usuarios desactivados',
                'deleted' => 'Usuarios eliminados',
                'edit' => 'Modificar Usuario',
                'management' => 'Administración de Usuarios',
                'no_permissions' => 'Sin Permisos',
                'no_roles' => 'No hay Roles disponibles.',
                'permissions' => 'Permisos',

                'table' => [
                    'confirmed' => 'Confirmado',
                    'created' => 'Creado',
                    'enterprise' => 'Empresa',
                    'email' => 'Correo',
                    'id' => 'ID',
                    'last_updated' => 'Última modificación',
                    'name' => 'Nombre',
                    'no_deactivated' => 'Ningún Usuario desactivado disponible',
                    'no_deleted' => 'Ningún Usuario eliminado disponible',
                    'roles' => 'Roles',
                    'total' => 'Todos los Usuarios',
                ],
            ],

            'enterprises' => [
                'create' => 'Crear Empresa',
                'edit' => 'Modificar Empresa',
                'management' => 'Administración de Empresa',
                'deleted' => 'Empresas eliminadas',

                'table' => [
                    'contact' => 'Contacto',
                    'email' => 'Email de la Empresa',
                    'enterprise' => 'Empresa',
                    'phone' => 'Telefono',
                    'rfc' => 'RFC de la Empresa',
                    'confirmed' => 'Confirmado',
                    'created' => 'Creado',
                    'id' => 'ID',
                    'last_updated' => 'Última modificación',
                    'no_deactivated' => 'Ningún Usuario desactivado disponible',
                    'no_deleted' => 'Ningún Usuario eliminado disponible',
                    'total' => 'Todas las Empresas',
                ],
            ],

            'lines' => [
                'create' => 'Crear Linea',
                'edit' => 'Modificar Linea',
                'management' => 'Administración de Líneas',
                'deleted' => 'Lineas Eliminadas',

                'table' => [
                    'name' => 'Linea',
                    'phone' => 'Telefono',
                    'user' => 'Usuario',
                    'confirmed' => 'Confirmado',
                    'created' => 'Creado',
                    'id' => 'ID',
                    'last_updated' => 'Última modificación',
                    'no_deactivated' => 'Ningún Usuario desactivado disponible',
                    'no_deleted' => 'Ningún Usuario eliminado disponible',
                    'total' => 'Todas las Lineas',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Labels Crecursos
    |--------------------------------------------------------------------------
    */
    'crecursos' => [
        'access' => [
            'enterprise' => [
                'management' => 'Administración de Empresas',
                'main' => 'Lista de Empresas',
                'active' => 'Lista de Empresas',
                'create' => 'Crear Empresa',
                'edit' => 'Modificar Empresa',
                'no_departments' => 'No hay Departamentos disponibles.',

                'table' => [
                    'rfc' => 'RFC',
                    'enterprise' => 'Empresa',
                    'department' => 'Departamentos',
                    'email' => 'Email',
                    'phone' => 'Telefono',
                    'address' => 'Dirección',
                    'created' => 'Creado',
                    'last_updated' => 'Última modificación',
                    'total' => 'Todas las Empresas',
                ],
            ],

            'department' => [
                'management' => 'Administración de Departamentos',
                'main' => 'Lista de Departamentos',
                'active' => 'Lista de Departamentos',
                'create' => 'Crear Departamento',
                'edit' => 'Modificar Departamento',

                'table' => [
                    'id_department' => 'ID Departamento',
                    'name_department' => 'Departamento',
                    'boss' => 'Jefe departamento',
                    'area' => 'Area',
                    'description' => 'Descripción',
                ],
            ],
                            
            'humanresources' => [
                'create' => 'Crear Vacante',
                'management' => 'Administración de Vacantes',
                'applicant' => 'Datos del solicitante',
                'assigned' => 'Datos de la asignación',
                'candidate' => 'Datos del candidato',
                'vacant' => 'Datos de la vacante',
                'edit' => 'Modificar Vacante',

                'table'=> [
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
            ],

            'candidate' => [
                'create' => 'Crear candidato',
                'edit' => 'Modificar candidato',
                'applicant' => 'Datos del Candidato',
                'competencia' => 'Competencias del candidato',
                'candidate' => 'Habilidades del candidato',
                'perfil' => 'Perfil social',
                'management' => 'Administración de Candidatos',
                'deleted' => 'Candidatos eliminados',
                'validation' => 'Validar',

                'table' => [
                    'namecan' => 'Nombre del candidato',
                    'laveleducation' => 'Nivel educativo',
                    'career' => 'Carrera',
                    'email' => 'Correo',
                ],
            ],

            'compettition' => [
                'create' => 'Dar de alta una nueva competencia o habilidad',
                'management' => 'Administración de competencias y habilidades',
                'edit' => 'Editar Competencia o Habilidad',

                'table'=> [
                    'category' => 'Categoría',
                    'name' =>  'Nombre de la competencia',
                    'type' => 'Tipo',
                ],
            ],

                            
            'personal' => [
                'management' => 'Administración de Personal',
                'main' => 'Lista de Empleados',
                'active' => 'Empleados Activos',
                'create' => 'Alta de Empleados',
                'edit' => 'Modificar de Empleado',
                'deleted' => 'Usuarios eliminados',
                'information-pers' => 'Información Personal',
                'information-prof' => 'Información Profesional',

                'table' => [
                    'name' => 'Nombre',
                    'address' => 'Dirección',
                    'email' => 'Email',
                    'level-studies' => 'Nivel de Estudios',
                    'career' => 'Carrera',
                ],
            ],

            'job' => [
                'management' => 'Administración de puestos',
                'create' => 'Alta de puestos',
                'edit' => 'Modificar puestos',
                'deleted' => 'Puestos eliminados',

                'table' => [
                    'name_jobs' => 'Nombre del puesto',
                    'department' => 'Departamento',
                    'immediate_boss' => 'Jefe inmediato',
                    'job_description'=> 'Descripción del puesto',
                    'salary' => 'Salario base',
                    'salary_g' => 'Salario global',
                    ],
            ],

            'project' => [
                'management' => 'Administración de Proyectos',
                'main' => 'Lista de Proyectos',
                'active' => 'Lista de Proyectos',
                'create' => 'Crear Proyecto',
                'edit' => 'Modificar Proyecto',
                'information-project' => 'Información del Proyecto',
                'concepts' => 'Conceptos del Proyecto',

                'table' => [
                    'name' => 'Nombre Proyecto',
                    'description' => 'Descripción',
                    'contractor' => 'Empresa Contratista',
                    'date_init' => 'Fecha de Incio',
                    'date_end' => 'Fecha Fin',
                    'amount' => 'Monto',
                ],
            ],

            'concept' => [                
                'management' => 'Administración de Conceptos',
                'active' => 'Plan de Conceptos',
                'estimated' => 'Estimado (Hrs. x Mes)',
                'executed' => 'Ejecutado (% de Avance | Hrs. Diferencia x Mes)',
                'main' => 'Conceptos',
                'main-h' => 'Asignación de Horas',
                'main-p' => 'Asignación de Avance',
                'edit' => 'Editar de Horas',
                'create' => 'Asignar Horas',

                'table' => [
                    'personal' => 'Personal Asignado',
                    'name' => 'Concepto',
                    'january' => 'Enero',
                    'february' => 'Febrero',
                    'march' => 'Marzo',
                    'april' => 'Abril',
                    'may' => 'Mayo',
                    'june' => 'Junio',
                    'july' => 'Julio',
                    'agust' => 'Agosto',
                    'september' => 'Septiembre',
                    'october' => 'Octubre',
                    'november' => 'Noviembre',   
                    'december' => 'Diciembre',
                ],
            ],

            'project-advance' => [
                'management' => 'Avance de Proyectos',
                'main' => 'Lista de Avances',
                'active' => 'Lista de Avances',
            ],
        ],
    ],
];
