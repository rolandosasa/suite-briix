<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RHTableSeeder extends Seeder
{
    public function run()
    {
      /*  if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }*/

        
        $this->call(RHUserTableSeeder::class);
        $this->call(RHRoleTableSeeder::class);
        $this->call(RHUserRoleSeeder::class);
        $this->call(RHPermissionTableSeeder::class);
        $this->call(RHPermissionRoleSeeder::class);
        $this->call(RHCompettitionsTableSeeder::class);
        $this->call(RHEnterpriseTableSeeder::class);
        $this->call(RHDepartmentTableSeeder::class);
        $this->call(RHMonthTableSeeder::class);
        $this->call(RHProjectTableSeeder::class);
        $this->call(RHConceptTableSeeder::class);
        $this->call(RHEstimatedTableSeeder::class);
        $this->call(RHStatesTableSeeder::class);
        $this->call(RHJobTableSeeder::class);

        /*if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }*/

    }
}