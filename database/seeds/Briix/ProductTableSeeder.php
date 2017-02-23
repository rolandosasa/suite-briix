<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionTableSeeder
 */
class ProductTableSeeder extends Seeder
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

        $product_model          = config('access.product');
        $viewBackend               = new $product_model;
        $viewBackend->name         = 'all';
        $viewBackend->display_name = 'All';
        $viewBackend->sort         = 1;
        $viewBackend->created_at   = Carbon::now();
        $viewBackend->updated_at   = Carbon::now();
        $viewBackend->save();

        $product_model          = config('access.product');
        $viewBackend               = new $product_model;
        $viewBackend->name         = 'briix';
        $viewBackend->display_name = 'Briix';
        $viewBackend->sort         = 2;
        $viewBackend->created_at   = Carbon::now();
        $viewBackend->updated_at   = Carbon::now();
        $viewBackend->save();

        $product_model          = config('access.product');
        $viewBackend               = new $product_model;
        $viewBackend->name         = 'crecursos';
        $viewBackend->display_name = 'Crecursos';
        $viewBackend->sort         = 3;
        $viewBackend->created_at   = Carbon::now();
        $viewBackend->updated_at   = Carbon::now();
        $viewBackend->save();

        $product_model          = config('access.product');
        $viewBackend               = new $product_model;
        $viewBackend->name         = 'cmovil';
        $viewBackend->display_name = 'Cmovil';
        $viewBackend->sort         = 4;
        $viewBackend->created_at   = Carbon::now();
        $viewBackend->updated_at   = Carbon::now();
        $viewBackend->save();

        $product_model          = config('access.product');
        $viewBackend               = new $product_model;
        $viewBackend->name         = 'denegado';
        $viewBackend->display_name = 'Ninguno';
        $viewBackend->sort         = 5;
        $viewBackend->created_at   = Carbon::now();
        $viewBackend->updated_at   = Carbon::now();
        $viewBackend->save();


       /* if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }*/
    }
}