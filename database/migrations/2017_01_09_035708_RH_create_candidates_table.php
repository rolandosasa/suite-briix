<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RHCreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::connection('cRecursos')->create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namecan');
            $table->string('laveleducation');
            $table->string('school');
            $table->string('career'); 
            $table->string('identitycard');
            $table->string('curp');
            $table->string('rfccandidate');
            $table->string('phonecel');
            $table->string('phonehome');
            $table->string('genrecandidate');
            $table->string('civilstatecandidate');
            $table->string('birthday');
            $table->string('egacandidate');
            $table->string('imss');
            $table->string('state');
            $table->string('citycandidate');
            $table->string('colony') ;
            $table->string('address');
            $table->string('statuscandidate');
            $table->string('email');
            $table->string('applyfor');
            $table->string('category');
            $table->string('compettition');
            $table->string('levelReq');
            $table->string('applyfortwo');
            $table->string('categorytwo');
            $table->string('compettitiontwo');
            
            $table->string('levelReqtwo');
            $table->string('socialnetwork');
            $table->string('linkp');
            $table->string('enterprises');
            $table->string('activity');
            $table->string('antiquity');
            $table->string('reference');
            $table->string('reasonofexit');       
            $table->string('validation');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('cRecursos')->drop('candidates');
    }
}
