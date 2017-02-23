<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRoleSeeder
 */
class UserRoleSeeder extends Seeder
{
    public function run()
    {
       /* if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table(config('access.assigned_roles_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.assigned_roles_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.assigned_roles_table') . ' CASCADE');
        }

        //Attach admin role and plan to admin user all*/
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model;
        $user_model::first()->attachRole(1);
       // $user_model::first()->attachPacket(1);
//
        //Attach executive role  to executive user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model;
        $user_model::find(2)->attachRole(2);
        //$user_model::find(2)->attachPacket(2);

        //Attach user role to general user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model;
        $user_model::find(3)->attachRole(2);
        //$user_model::find(3)->attachPacket(3);

        //Attach user role to general user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model;
        $user_model::find(4)->attachRole(2);
       // $user_model::find(4)->attachPacket(4);

        //Attach user role to general user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model;
        $user_model::find(5)->attachRole(4);
     //   $user_model::find(5)->attachPacket(4);

        /*if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }*/
    }
}