<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BriixTableSeeder extends Seeder
{
    public function run()
    {
      /*  if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }*/


        $this->call(EnterpriseTableSeeder::class);

        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(PacketTableSeeder::class);
        $this->call(ProductPacketSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(ContractTableSeeder::class);
        $this->call(ContractPacketSeeder::class);
        $this->call(PermissionRoleSeeder::class);


        /*if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }*/

    }
}