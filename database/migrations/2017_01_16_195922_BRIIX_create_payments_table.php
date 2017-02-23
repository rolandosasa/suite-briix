<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BRIIXCreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::connection('briix')->create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('dateInit');            
            $table->timestamp('dateEnd');
            $table->integer('period');
            $table->float('amount_pay');
            $table->string('reference_id')->unique();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::connection('briix')->drop('payments');
    }
}
