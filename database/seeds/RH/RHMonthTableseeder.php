<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RHMonthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $months = [
        [ 'month'   => 'Enero'],
        [ 'month'   => 'Febrero'],
        [ 'month'   => 'Marzo'],
        [ 'month'   => 'Abril'],
        [ 'month'   => 'Mayo'],
        [ 'month'   => 'Junio'],
        [ 'month'   => 'Julio'],
        [ 'month'   => 'Agosto'],
        [ 'month'   => 'Septimbre'],
        [ 'month'   => 'Octubre'],
        [ 'month'   => 'Novimbre'],
        [ 'month'   => 'Diciembre'],
      ];

      DB::connection('cRecursos')->table(config('accessRH.months_table'))->insert($months);
    }
}
