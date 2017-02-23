<?php

use Illuminate\Database\Seeder;
use App\Models\Cmovil\Access\Role\Role;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionRoleSeeder
 */
class CMPermissionRoleSeeder extends Seeder
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
		Role::find(2)->permissions()->sync([1, 2]);
		Role::find(3)->permissions()->sync([1]);
		//Plan::find(2)->permissions()->sync([2]);
		//Plan::find(3)->permissions()->sync([3]);
		/**
		 * 
		 */

		/*if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		}*/
	}
}