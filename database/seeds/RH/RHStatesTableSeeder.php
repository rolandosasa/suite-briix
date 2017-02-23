<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RHStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Datos para la tabla Estados de la republica
        //id:1
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Aguascalientes'
            ));
        //id:2
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Baja California'
            ));
        //id:3
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Baja California Sur'
            ));
        //id:4
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Campeche'
            ));
        //id:5
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Coahuila'
            ));
        //id:6
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Colima'
            ));
        //id:7
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Chiapas'
            ));
        //id:8
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Chihuahua'
            ));
        //id:9
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Ciudad de México'
            ));
        //id:10
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Durango'
            ));
        //id:11
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Estado de México'
            ));
        //id:12
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Guanajuato'
            ));
        //id:13
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Guerrero'
            ));
        //id:14
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Hidalgo'
            ));
        //id:15
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Jalisco'
            ));
        //id:16
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Michoacán'
            ));
        //id:17
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Morelos'
            ));
        //id:18
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Nayarit'
            ));
        //id:19
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Nuevo León'
            ));
        //id:20
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Oaxaca'
            ));
        //id:21
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Puebla'
            ));
        //id:22
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Querétaro'
            ));
        //id:23
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Quintana Roo'
            ));
        //id:24
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'San Luis Potosí'
            ));
        //id:25
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Sinaloa'
            ));
        //id:26
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Sonora'
            ));
        //id:27
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Tabasco'
            ));
        //id:28
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Tamaulipas'
            ));
        //id:29
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Tlaxcala'
            ));
        //id:30
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Veracruz'
            ));
        //id:31
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Yucatán'
            ));
        //id:32
        \DB::connection('cRecursos')->table('states')->insert(array(
            'namestate'           => 'Zacatecas'
            ));
    }
}
