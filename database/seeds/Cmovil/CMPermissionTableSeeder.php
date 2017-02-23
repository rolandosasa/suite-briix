<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionTableSeeder
 */
class CMPermissionTableSeeder extends Seeder
{
    public function run()
    {
       /* if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table(config('access.permissions_table'))->truncate();
            DB::table(config('access.permission_role_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.permissions_table'));
            DB::statement('DELETE FROM ' . config('access.permission_role_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.permissions_table') . ' CASCADE');
            DB::statement('TRUNCATE TABLE ' . config('access.permission_role_table') . ' CASCADE');
        }
*/
        /**
         * Don't need to assign any permissions to administrator because the all flag is set to true
         * in RoleTableSeeder.php
         */

        /**
         * Misc Access Permissions
         */
        $permission_model          = config('accessCM.permission');
        $viewPanel               = new $permission_model;
        $viewPanel->name         = 'view-panel';
        $viewPanel->display_name = 'View Panel';
        $viewPanel->sort         = 1;
        $viewPanel->created_at   = Carbon::now();
        $viewPanel->updated_at   = Carbon::now();
        $viewPanel->save();

        /**
         * Access Permissions
         */
        $permission_model          = config('accessCM.permission');
        $adminUsers               = new $permission_model;
        $adminUsers->name         = 'admin-users';
        $adminUsers->display_name = 'Admin Users';
        $adminUsers->sort         = 2;
        $adminUsers->created_at   = Carbon::now();
        $adminUsers->updated_at   = Carbon::now();
        $adminUsers->save();

        $permission_model          = config('accessCM.permission');
        $adminRoles               = new $permission_model;
        $adminRoles->name         = 'admin-roles';
        $adminRoles->display_name = 'Admin Roles';
        $adminRoles->sort         = 3;
        $adminRoles->created_at   = Carbon::now();
        $adminRoles->updated_at   = Carbon::now();
        $adminRoles->save();

        

       /* if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }*/
    }
}