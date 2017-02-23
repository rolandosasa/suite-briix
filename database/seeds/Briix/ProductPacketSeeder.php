<?php

use Illuminate\Database\Seeder;
use App\Models\Briix\Access\Role\Role;
use App\Models\Briix\Access\Packet\Packet;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductPacketSeeder
 */
class ProductPacketSeeder extends Seeder
{
	public function run()
	{
		/*if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		}

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::table(config('access.permission_role_table'))->truncate();
		} elseif (DB::connection()->getDriverName() == 'sqlite') {
			DB::statement('DELETE FROM ' . config('access.permission_role_table'));
		} else {
			//For PostgreSQL or anything else
			DB::statement('TRUNCATE TABLE ' . config('access.permission_role_table') . ' CASCADE');
		}*/

		/**
		 * Assign view backend and manage user permissions to executive role as example
		 */
		
		Packet::find(2)->products()->sync([2]);
		Packet::find(3)->products()->sync([3]);
		Packet::find(4)->products()->sync([4]);
		/**
		 * 
		 */

		/*if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		}*/
	}
}