<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ContractPacketSeeder
 */
class ContractPacketSeeder extends Seeder
{
    public function run()
    {
       /* if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table(config('access.assigned_Packets_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.assigned_Packets_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.assigned_Packets_table') . ' CASCADE');
        }

        //Attach admin Packet and plan to admin Contract all*/

        $contract_model = config('auth.providers.contracts.model');
        $contract_model = new $contract_model;
        $contract_model::first()->attachPacket(1);

     //   $Contract_model::find(5)->attachPacket(4);

        /*if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }*/
    }
}