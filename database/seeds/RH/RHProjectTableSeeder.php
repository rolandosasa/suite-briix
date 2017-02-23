<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;

class RHProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$projects = [
    		[
    			'name_project' 	=> 'Proyecto 1',
    			'description'		=> 'Proyecto ejemplo 1',
    			'contractor'			=> 'Contratista 1',
    			'date_init'			=> Carbon::now(),
    			'date_end'      => Carbon::now(),
    			'total_amount' 	=> 1000000
    		],
    		[
    			'name_project' 	=> 'Proyecto 2',
    			'description'		=> 'Proyecto ejemplo 2',
    			'contractor'			=> 'contratista 2',
    			'date_init'			=> Carbon::now(),
    			'date_end'      => Carbon::now(),
    			'total_amount' 	=> 3000000
    		],
    		[
    			'name_project' 	=> 'Proyecto 3',
    			'description'		=> 'Proyecto ejemplo 3',
    			'contractor'			=> 'Contratista 3',
    			'date_init'			=> Carbon::now(),
    			'date_end'      => Carbon::now(),
    			'total_amount' 	=> 2000000
    		],
            [
                'name_project'  => 'Proyecto 5',
                'description'       => 'Proyecto ejemplo 5',
                'contractor'            => 'Contratista 5',
                'date_init'         => Carbon::now(),
                'date_end'      => Carbon::now(),
                'total_amount'  => 2000000
            ],
            [
                'name_project'  => 'Proyecto 6',
                'description'       => 'Proyecto ejemplo 6',
                'contractor'            => 'Contratista 6',
                'date_init'         => Carbon::now(),
                'date_end'      => Carbon::now(),
                'total_amount'  => 2000000
            ],
    	];

    	DB::connection('cRecursos')->table(config('accessRH.projects_table'))->insert($projects);
    }
}
