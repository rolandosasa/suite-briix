<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Administración de acceso',

            'roles' => [
                'all' => 'Todos los Roles',
                'create' => 'Nuevo Rol',
                'edit' => 'Modificar Rol',
                'management' => 'Administración de Roles',
                'main' => 'Roles',
            ],

            'users' => [
                'all' => 'Todos los Usuarios',
                'change-password' => 'Cambiar la contraseña',
                'create' => 'Nuevo Usuario',
                'deactivated' => 'Usuarios Desactivados',
                'deleted' => 'Usuarios Eliminados',
                'edit' => 'Modificar Usuario',
                'main' => 'Usuario',
            ],
        ],

        'log-viewer' => [
            'main' => 'Gestór de Logs',
            'dashboard' => 'Principal',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Principal',
            'general' => 'General',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menus Language
    |--------------------------------------------------------------------------
    */
    'language-picker' => [
        'language' => 'Idioma',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'العربية (Arabic)',
            'da' => 'Danés (Danish)',
            'de' => 'Alemán (German)',
            'en' => 'Inglés (English)',
            'es' => 'Español (Spanish)',
            'fr' => 'Francés (French)',
            'it' => 'Italiano (Italian)',
            'pt-BR' => 'Portugués Brasileño',
            'sv' => 'Sueco (Swedish)',
            'th' => 'Thai',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menus Briix
    |--------------------------------------------------------------------------
    */
    'briix' => [
        'access' => [
            'title' => 'Usuarios',
            'title2' => 'Empresas',
            'title3' => 'Contratos',
            'title4' => 'Tipos de licencia',
            'title5' => 'Roles',
            'title6' => 'Productos',

            'roles' => [
                'all' => 'Todos los Roles',
                'create' => 'Nuevo Rol',
                'edit' => 'Modificar Rol',
                'management' => 'Administración de Roles',
                'main' => 'Roles',
            ],

            'packets' => [
                'all' => 'Todos los Paquetes',
                'create' => 'Nuevo Paquete',
                'edit' => 'Modificar Paquete',
                'management' => 'Administración de Paquetes',
                'main' => 'Paquetes',
            ],

            'users' => [
                'all' => 'Todos los Usuarios',
                'change-password' => 'Cambiar la contraseña',
                'create' => 'Nuevo Usuario',
                'deactivated' => 'Usuarios Desactivados',
                'deleted' => 'Usuarios Eliminados',
                'edit' => 'Modificar Usuario',
                'main' => 'Usuario',
            ],

            'enterprises' => [
                'all' => 'Todas las Empresas',
                'create' => 'Nueva Empresa',
                'edit' => 'Modificar Empresa',
                'deleted' => 'Empresas Eliminadas',
                'management' => 'Administración de Empresas',
                'main' => 'Empresas',
            ],


            'contracts' => [
                'all' => 'Todos los Contratos',
                'create' => 'Nuevo Contrato',
                'edit' => 'Modificar Contrato',
                'deleted' => 'Contratos Eliminados',
                'management' => 'Administración de Contratos',
                'main' => 'Contratos',
            ],

            'ratePlans' => [
                'all' => 'Todos los tipos de licencias',
                'create' => 'Nuevo tipo de licencia',
                'edit' => 'Modificar tipo de licencia',
                'deleted' => 'Tipos de licencia Eliminados',
                'management' => 'Administración de tipos de licencia',
                'main' => 'Tipos de licencia',
            ],

            'discountPlans' => [
                'all' => 'Todos los planes de descuentos',
                'create' => 'Nuevo plan de descuento',
                'edit' => 'Modificar plan de descuento',
                'deleted' => 'Plan de descuentos Eliminados',
                'management' => 'Administración de planes de descuentos',
                'main' => 'Plan de descuentos',
            ],
        ],

        'log-viewer' => [
            'main' => 'Gestór de Logs',
            'dashboard' => 'Principal',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Principal',
            'general' => 'General',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menus Cmovil
    |--------------------------------------------------------------------------
    */
    'cmovil' => [
        'access' => [
            'title' => 'Usuarios',
            'title2' => 'Empresas',
            'title3' => 'Contratos',
            'title4' => 'Plan Tarifario',
            'title5' => 'Roles',
            'title6' => 'Producto',
            'title7' => 'Lineas',

            'roles' => [
                'all' => 'Todos los Roles',
                'create' => 'Nuevo Rol',
                'edit' => 'Modificar Rol',
                'management' => 'Administración de Roles',
                'main' => 'Roles',
            ],

            'lines' => [
                'all' => 'Todos las Lineas',
                'create' => 'Nueva Linea',
                'edit' => 'Modificar Linea',
                'deleted' => 'Lineas Eliminadas',
                'management' => 'Administración de Lineas',
                'main' => 'Lineas',
            ],

            'plans' => [
                'all' => 'Todos los Productos',
                'create' => 'Nuevo Producto',
                'edit' => 'Modificar Producto',
                'management' => 'Administración de Productos',
                'main' => 'Productos',
            ],

            'users' => [
                'all' => 'Todos los Usuarios',
                'change-password' => 'Cambiar la contraseña',
                'create' => 'Nuevo Usuario',
                'deactivated' => 'Usuarios Desactivados',
                'deleted' => 'Usuarios Eliminados',
                'edit' => 'Modificar Usuario',
                'main' => 'Usuario',
            ],

            'enterprises' => [
                'all' => 'Todas las Empresas',
                'create' => 'Nueva Empresa',
                'edit' => 'Modificar Empresa',
                'deleted' => 'Empresas Eliminadas',
                'management' => 'Administración de Empresas',
                'main' => 'Empresas',
            ],


            'contracts' => [
                'all' => 'Todos los Contratos',
                'create' => 'Nuevo Contrato',
                'edit' => 'Modificar Contrato',
                'deleted' => 'Contratos Eliminados',
                'management' => 'Administración de Contratos',
                'main' => 'Contratos',
            ],

            'ratePlans' => [
                'all' => 'Todos los Planes Tarifarios',
                'create' => 'Nuevo Plan Tarifario',
                'edit' => 'Modificar Plan Tarifario',
                'deleted' => 'Planes Tarifarios Eliminados',
                'management' => 'Administración de Planes Tarifarios',
                'main' => 'Planes Tarifarios',
            ],
        ],

        'log-viewer' => [
            'main' => 'Gestór de Logs',
            'dashboard' => 'Principal',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Principal',
            'general' => 'General',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menus Crecursos
    |--------------------------------------------------------------------------
    */
    'crecursos' => [
        'access' => [
            'title' => 'Administración de acceso',
            'title1' => 'Catalogos',
            'title2' => 'Recursos Humanos',

            'personal' => [
                'main' => 'Personal',
                'create' => 'Nuevo Empleado',
                'all' => 'Todos los Empleados',
                'edit' => 'Modificar Empleado',
                'deleted' => 'Empleados Eliminados',
            ],

            'department' => [
                'main' => 'Departamento',
                'all' => 'Todos los Departamentos',
                'create' => 'Nuevo Departamento',
            ],

            'enterprise' => [
                'main' => 'Empresa',
                'all' => 'Todas las Empresas',
                'create' => 'Nueva Empresa',
            ],

            'project' => [
                'main' => 'Proyecto',
                'all' => 'Todos los Proyectos',
                'create' => 'Nuevo Proyecto',
            ],
        ],

        'log-viewer' => [
            'main' => 'Gestór de Logs',
            'dashboard' => 'Principal',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Principal',
            'general' => 'General',

        ],

        'administration' => [
            'main' => 'Administración',
            'dashboard-department' => 'Departamentos',
            'dashboard-enterprise' => 'Empresas',
        ],

        'humanresources' => [
            'main' => 'Gestión de R.H.',
            'dashboard' => 'Reclutamiento',
            'dashboard-personal' => 'Personal',
            'dashboard-job' => 'Puesto',
            'resources' => 'Recursos Humanos',
            'all' => 'Todas las vacantes',
            'create' => 'Nueva Vacante',
            'management' => 'Administración de vacantes',
            'vacancies' => 'Vacantes',
            'validation' => 'Validar',
            'view-employe' => 'Ver Empleados',
            'create-employe' => 'Alta de Empleados',
        ],

        'candidate' => [ 
                'main' => 'Candidatos',
                'all' => 'Todos los Candidatos',
                'create' => 'Nuevo Candidato',
                'management' => 'Administración de Candidatos',
                'Calendar'  => 'Calendario',
        ],

        'compettition' => [
            'main' => 'Competencias y habilidades',
            'all' => 'Todas',
            'create' => 'Nueva',
            'management' => 'Administración de competencias y habilidades',
        ],

        'projects' => [
            'main' => 'Gestión de Actividades',
            'dashboard-project' => 'Proyectos',
            'dashboard-advance' => 'Avance de Proyectos',
        ],

        'job' => [
            'main' => 'Puestos',
            'all' => 'Todos los puestos',
            'create'=> 'Nuevo puesto',
            'management' => 'Administración de puestos',
        ],
    ],
];
