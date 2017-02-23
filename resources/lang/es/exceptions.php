<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'roles' => [
                'already_exists' => 'Este Rol ya existe. Por favor, especifique un nombre de Rol diferente.',
                'cant_delete_admin' => 'No puede eliminar el Rol de Administrador.',
                'create_error' => 'Hubo un problema al crear el Rol. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar el Rol. Intentelo de nuevo.',
                'has_users' => 'No puede eliminar un Rol que tenga usuarios asignados.',
                'needs_permission' => 'Debe seleccionar al menos un permiso para cada Rol.',
                'not_found' => 'El Rol requerido no existe.',
                'update_error' => 'Hubo un problema al modificar el Rol. Intentelo de nuevo.',
            ],

            'users' => [
                'cant_deactivate_self' => 'No puede desactivarse a sí mismo.',
                'cant_delete_self' => 'No puede eliminarse usted mismo.',
                'create_error' => 'Hubo un problema al crear el Usuario. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar el Usuario. Intentelo de nuevo.',
                'email_error' => 'Ya hay un Usuario con la dirección de E-Mail especificada.',
                'mark_error' => 'Hubo un problema al modificar el Usuario. Intentelo de nuevo.',
                'not_found' => 'El Usuario requerido no existe.',
                'restore_error' => 'Hubo un problema al restaurar el Usuario. Intentelo de nuevo.',
                'role_needed_create' => 'Los Usuarios deben tener al menos un Rol. El Usuario fue creado, pero desactivado.',
                'role_needed' => 'Debes elegir al menos un Rol.',
                'update_error' => 'Hubo un problema al modificar el Usuario. Intentelo de nuevo.',
                'update_password_error' => 'Hubo un problema al cambiar la contraseña. Intentelo de nuevo.',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Exception Frontend
    |--------------------------------------------------------------------------
    */
    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Su cuenta ya ha sido verificada.',
                'confirm' => 'Revise su correo y verifique su cuenta!',
                'created_confirm' => 'Su cuenta ha sido creada. Le hemos enviado un e-mail con un enlace de verificación.',
                'mismatch' => 'El código de verificación no coincide.',
                'not_found' => 'El código de verificación especificado no existe.',
                'resend' => 'Su cuenta no ha sido verificada todavía. Por favor, revise su e-mail, o <a href="' . route('account.confirm.resend', ':user_id') . '">pulse aquí</a> para re-enviar el correo de verificación.',
                'success' => 'Su cuenta ha sido verificada satisfactoriamente!',
                'resent' => 'Un nuevo correo de verificación le ha sido enviado.',
            ],

            'deactivated' => 'Su cuenta ha sido desactivada.',
            'email_taken' => 'El correo especificado ya está registrado.',

            'password' => [
                'change_mismatch' => 'La contraseña antigua no coincide.',
            ],


        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Exception Briix
    |--------------------------------------------------------------------------
    */
    'briix' => [
        'access' => [
            'roles' => [
                'already_exists' => 'Este Rol ya existe. Por favor, especifique un nombre de Rol diferente.',
                'cant_delete_admin' => 'No puede eliminar el Rol de Administrador.',
                'create_error' => 'Hubo un problema al crear el Rol. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar el Rol. Intentelo de nuevo.',
                'has_users' => 'No puede eliminar un Rol que tenga usuarios asignados.',
                'needs_permission' => 'Debe seleccionar al menos un permiso para cada Rol.',
                'not_found' => 'El Rol requerido no existe.',
                'update_error' => 'Hubo un problema al modificar el Rol. Intentelo de nuevo.',
            ],

            'users' => [
                'cant_deactivate_self' => 'No puede desactivarse a sí mismo.',
                'cant_delete_self' => 'No puede eliminarse usted mismo.',
                'create_error' => 'Hubo un problema al crear el Usuario. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar el Usuario. Intentelo de nuevo.',
                'email_error' => 'Ya hay un Usuario con la dirección de E-Mail especificada.',
                'mark_error' => 'Hubo un problema al modificar el Usuario. Intentelo de nuevo.',
                'not_found' => 'El Usuario requerido no existe.',
                'restore_error' => 'Hubo un problema al restaurar el Usuario. Intentelo de nuevo.',
                'role_needed_create' => 'Los Usuarios deben tener al menos un Rol. El Usuario fue creado, pero desactivado.',
                'role_needed' => 'Debes elegir al menos un Rol.',
                'update_error' => 'Hubo un problema al modificar el Usuario. Intentelo de nuevo.',
                'update_password_error' => 'Hubo un problema al cambiar la contraseña. Intentelo de nuevo.',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Exception Cmovil
    |--------------------------------------------------------------------------
    */
    'cmovil' => [
        'access' => [
            'roles' => [
                'already_exists' => 'Este Rol ya existe. Por favor, especifique un nombre de Rol diferente.',
                'cant_delete_admin' => 'No puede eliminar el Rol de Administrador.',
                'create_error' => 'Hubo un problema al crear el Rol. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar el Rol. Intentelo de nuevo.',
                'has_users' => 'No puede eliminar un Rol que tenga usuarios asignados.',
                'needs_permission' => 'Debe seleccionar al menos un permiso para cada Rol.',
                'not_found' => 'El Rol requerido no existe.',
                'update_error' => 'Hubo un problema al modificar el Rol. Intentelo de nuevo.',
            ],

            'users' => [
                'cant_deactivate_self' => 'No puede desactivarse a sí mismo.',
                'cant_delete_self' => 'No puede eliminarse usted mismo.',
                'create_error' => 'Hubo un problema al crear el Usuario. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar el Usuario. Intentelo de nuevo.',
                'email_error' => 'Ya hay un Usuario con la dirección de E-Mail especificada.',
                'mark_error' => 'Hubo un problema al modificar el Usuario. Intentelo de nuevo.',
                'not_found' => 'El Usuario requerido no existe.',
                'restore_error' => 'Hubo un problema al restaurar el Usuario. Intentelo de nuevo.',
                'role_needed_create' => 'Los Usuarios deben tener al menos un Rol. El Usuario fue creado, pero desactivado.',
                'role_needed' => 'Debes elegir al menos un Rol.',
                'update_error' => 'Hubo un problema al modificar el Usuario. Intentelo de nuevo.',
                'update_password_error' => 'Hubo un problema al cambiar la contraseña. Intentelo de nuevo.',
            ],
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Exception Crecursos
    |--------------------------------------------------------------------------
    */
    'crecursos' => [
       'access' => [
            'department' => [
                'create_error' => 'Hubo un problema al crear el Departmento. Intentelo de nuevo.',
                'update_error' => 'Hubo un problema al modificar el Departmento. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar el Departmento. Intentelo de nuevo.',
            ],

            'enterprise' => [
                'already_exists' => 'Esta Empresa ya existe. Por favor, especifique un nombre de Empresa diferente.',
                'cant_delete_admin' => 'No puede eliminar la Empresa de Administrador.',
                'create_error' => 'Hubo un problema al crear la Empresa. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar la Empresa. Intentelo de nuevo.',
                'has_users' => 'No puede eliminar una Empresa que tenga usuarios asignados.',
                'needs_permission' => 'Debe seleccionar al menos un permiso para cada Empresa.',
                'not_found' => 'La Empresa requerido no existe.',
                'update_error' => 'Hubo un problema al modificar la Empresa. Intentelo de nuevo.',
                'restore_error' => 'Hubo un problema al restaurar la Empresa. Intentelo de nuevo.',
            ],

            'personal' => [
                'create_error' => 'Hubo un problema al crear el Empleado. Intentelo de nuevo.',
                'update_error' => 'Hubo un problema al modificar el Empleado. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar el Empleado. Intentelo de nuevo.',
            ],

            'project' => [
                'create_error' => 'Hubo un problema al crear el Proyecto. Intentelo de nuevo.',
                'update_error' => 'Hubo un problema al modificar el Proyecto. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar el Proyecto. Intentelo de nuevo.',
                'concept_error' => 'Al menos debe existir un concepto. Intentelo de nuevo.',
            ],

            'concept' => [
                'create_error' => 'Hubo un problema al crear el Concepto. Intentelo de nuevo.',
                'update_error' => 'Hubo un problema al modificar el Concepto. Intentelo de nuevo.',
                'delete_error' => 'Hubo un problema al eliminar el Concepto. Intentelo de nuevo.'
            ],
       ]
    ],
];
