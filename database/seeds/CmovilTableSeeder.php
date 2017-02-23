<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmovilTableSeeder extends Seeder
{
    public function run()
    {
      /*  if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }*/


        $this->call(CMEnterpriseTableSeeder::class);
        $this->call(CMUserTableSeeder::class);
        $this->call(CMRoleTableSeeder::class);
        $this->call(CMUserRoleSeeder::class);
        $this->call(CMPermissionTableSeeder::class);
        $this->call(CMPermissionRoleSeeder::class);


        /*if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }*/

    }
}