<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RHEnterpriseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $enterprises = [
        [
          'rfc'             => '01XXXXX',
          'name_enterprise' => 'NouSystem',
          'email'           => 'nousystem@nousystem.com',
          'phone'           => '123456789',
          'address'         => 'Carolina 76'
        ],
        [
          'rfc'             => '01ZZZZZ',
          'name_enterprise' => 'NouSystem',
          'email'           => 'nousystem@nousystem.com',
          'phone'           => '123456789',
          'address'         => 'Carolina 76'
        ]
      ];

      DB::connection('cRecursos')->table(config('accessRH.enterprises_table'))->insert($enterprises);
    }
}
