<?php

use Illuminate\Database\Seeder;
use App\Models\Briix\Access\Role\Role;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon as Carbon;
class CMEnterpriseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table(config('access.enterprises_table'))->truncate();
            DB::table(config('access.users_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.enterprises_table'));
            DB::statement('DELETE FROM ' . config('access.users_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.enterprises_table') . ' CASCADE');
            DB::statement('TRUNCATE TABLE ' . config('access.users_table') . ' CASCADE');
        }
*/
        

        /**
         * Misc Access Permissions
         */
        $enterprise_model          = config('accessCM.enterprise');
        $nousystem               = new $enterprise_model;
        $nousystem->name         = 'Nousystem';
        $nousystem->contact = 'Oswaldo Palomino';
        $nousystem->email         = 'empresa@nousystem.com';
        $nousystem->phone		=	'55232333';
        $nousystem->phone2      ='555555555555';
        $nousystem->address     =    'Carolina 76 int 202 Ciudad de los Deportes, Ciudad de Mexico';
        $nousystem->image   ='';
        $nousystem->rfc 		=	'N3H4H4J56';
        $nousystem->created_at   = Carbon::now();
        $nousystem->updated_at   = Carbon::now();
        $nousystem->save();

        //5 datos fiticios de empresas 
        //actory(App\Models\Cmovil\Access\Enterprise\Enterprise::class, 5)->create();

       
        
   

       /* if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }*/
    }
}
