<?php

return [

    /*
     * Users table used to store users
     */
    'users_table' => 'users',

    /*
     * Role model used by Access to create correct relations. Update the role if it is in a different namespace.
    */
    'role' => App\Models\Briix\Access\Role\Role::class,

    /*
     * Roles table used by Access to save roles to the database.
     */
    'roles_table' => 'roles',

    /*
     * Permission model used by Access to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'permission' => App\Models\Briix\Access\Permission\Permission::class,

    /*
     * Permissions table used by Access to save permissions to the database.
     */
    'permissions_table' => 'permissions',

    /*
     * Permission model used by Access to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'product' => App\Models\Briix\Access\Product\Product::class,

    /*
     * Permissions table used by Access to save permissions to the database.
     */
    'products_table' => 'products',

    /*
     * permission_role table used by Access to save relationship between permissions and roles to the database.
     */
    'permission_role_table' => 'permission_role',

    /*
     * assigned_roles table used by Access to save assigned roles to the database.
     */
    'assigned_roles_table' => 'assigned_roles',

    /*
     * Plan model used by Access to create correct relations. Update the plan if it is in a different namespace.
    */
    'packet' => App\Models\Briix\Access\Packet\Packet::class,

    /*
     * Plans table used by Access to save plans to the database.
     */
    'packets_table' => 'packets',

    'rate_plan' => App\Models\Briix\Access\RatePlan\RatePlan::class,

    /*
     * ratePlans table used by Access to save roles to the database.
     */
    'rate_plans_table' => 'rate_plans',


    /*
     * Contract model used by Access to create correct relations. Update the contract if it is in a different namespace.
    */
    'contract' => App\Models\Briix\Access\Contract\Contract::class,

    /*
     * Contracts table used by Access to save plans to the database.
     */
    'contracts_table' => 'contracts',

    /*
     * permission_plan table used by Access to save relationship between permissions and plans to the database.
     */
    'packet_product_table' => 'packet_product',

    /*
     * assigned_plans table used by Access to save assigned plans to the database.
     */
    'assigned_packets_table' => 'assigned_packets',

    /*
     * Enterprise model used by Access to create correct relations. Update the enterprise if it is in a different namespace.
    */
    'rate_plan' => App\Models\Briix\Access\RatePlan\RatePlan::class,

    /*
     * Enterprises table used by Access to save enterprises to the database.
     */
    'rate_plan_table' => 'rate_plans',

    /*
     * Discount Plan model used by Access to create correct relations. Update the discount plan if it is in a different namespace.
    */
    'discount_plan' => App\Models\Briix\Access\DiscountPlan\DiscountPlan::class,

    /*
     * Discount plans table used by Access to save discount plans to the database.
     */
    'discount_plan_table' => 'discount_plans',

      /*
     * Enterprise model used by Access to create correct relations. Update the enterprise if it is in a different namespace.
    */
    'enterprise' => App\Models\Briix\Access\Enterprise\Enterprise::class,

    /*
     * Enterprises table used by Access to save enterprises to the database.
     */
    'enterprises_table' => 'enterprises',

    /*
     * Configurations for the user
     */
    'users' => [
        /*
         * The role the user is assigned to when they sign up from the frontend, not namespaced
         */
        'default_role' => 'User',
        //'default_role' => 2,

        /*
         * Whether or not the user has to confirm their email when signing up
         */
        'confirm_email' => true,

        /*
         * Whether or not the users email can be changed on the edit profile screen
         */
        'change_email' => false,
    ],

    /*
     * Configuration for roles
     */
    'roles' => [
        /*
         * Whether a role must contain a permission or can be used standalone as a label
         */
        'role_must_contain_permission' => true
    ],

    /*
     * Configuration for plans
     */
    'plans' => [
        /*
         * Whether a plan must contain a permission or can be used standalone as a label
         */
        'plan_must_contain_permission' => true
    ],

    /*
     * Socialite session variable name
     * Contains the name of the currently logged in provider in the users session
     * Makes it so social logins can not change passwords, etc.
     */
    'socialite_session_name' => 'socialite_provider',

  

    

    /*
     * Application captcha specific settings
     */
    'captcha' => [
		/*
		 * The name of the session variable that stores the current login attempts for each user
		 */
		'session_key' => 'needs_captcha',

        /*
         * Whether the registration captcha is on or off
         */
        'registration' => env('REGISTRATION_CAPTCHA_STATUS', false),

        /*
         * Whether the login captcha is on or off
         */
        'login' => env('LOGIN_CAPTCHA_STATUS', false),

        /*
         * Number of login tries made before showing login captcha
         */
        'login_tries' => env('LOGIN_CAPTCHA_TRIES', 3),
     ],
];