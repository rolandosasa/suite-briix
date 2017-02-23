<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RHDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $departments = [
        [
          'id_department'     => '01',
          'name_department'   => 'Recursos Humanos',
          'description'       => 'Administracion del personal'
        ],
        [
          'id_department'     => '02',
          'name_department'   => 'Finanzas',
          'description'       => 'Administracion de las finanzas de la empresa'
        ],
        [
          'id_department'     => '03',
          'name_department'   => 'Marketing',
          'description'       => 'Supervision de las ventas'
        ],
        [
          'id_department'     => '04',
          'name_department'   => 'Direccion',
          'description'       => 'Administracion de la empresa'
        ],
        [
          'id_department'     => '05',
          'name_department'   => 'Sistemas',
          'description'       => 'Desarrollo de sistemas'
        ],

      ];

      DB::connection('cRecursos')->table(config('accessRH.departments_table'))->insert($departments);
    }
}
