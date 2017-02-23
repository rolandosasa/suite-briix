<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ContractTableSeeder
 */
class ContractTableSeeder extends Seeder
{
    public function run()
    {
      /*  if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table(config('access.contracts_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.contracts_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.contracts_table') . ' CASCADE');
        }*/

        //Add the master administrator, contract id of 1
        $contracts = [
            [
                'enterprise_id'     => 1,
                'client_id'         => 1,
                'executive_id'      => 1,
                'quantity'          => 20,
                'typePay'           => 'trial',
                'rate_plan_id'      => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
           
        ];

        DB::connection('briix')->table(config('access.contracts_table'))->insert($contracts);

       /* if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }*/
    }
}