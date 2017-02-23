<?php

use Illuminate\Database\Seeder;
use App\Models\Briix\Access\Role\Role;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon as Carbon;
class EnterpriseTableSeeder extends Seeder
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
        }*/


        /**
         * Misc Access Permissions
         */
        $enterprise_model          = config('access.enterprise');
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

        //5 datos fiticios de empresas supervisoras
        factory(App\Models\Briix\Access\Enterprise\Enterprise::class, 5)->create();

        $rate_plan_model         = config('access.rate_plan');
        $rate_plan               = new $rate_plan_model;
        $rate_plan->description  = 'Gerencial';
        $rate_plan->product      = 'C-movil';
        $rate_plan->cost         = 40;
        $rate_plan->created_at   = Carbon::now();
        $rate_plan->updated_at   = Carbon::now();
        $rate_plan->save();

        $discount_plan_model           = config('access.discount_plan');
        $discount_plan                 = new $discount_plan_model;
        $discount_plan->product        = 'C-movil';
        $discount_plan->rankStartMonth = 0;
        $discount_plan->rankEndMonth   = 1;
        $discount_plan->rankStartUser  = 0;
        $discount_plan->rankEndUser    = 10;
        $discount_plan->status         = 'Activo';
        $discount_plan->discount       = 10.0;
        $discount_plan->created_at     = Carbon::now();
        $discount_plan->updated_at     = Carbon::now();
        $discount_plan->save();


        //5 datos fiticios de empresas supervisoras
        factory(App\Models\Briix\Access\RatePlan\RatePlan::class, 5)->create();
        
   

       /* if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }*/
    }
}
