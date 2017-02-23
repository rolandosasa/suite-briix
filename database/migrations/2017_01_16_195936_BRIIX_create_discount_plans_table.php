<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BRIIXCreateDiscountPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::connection('briix')->create('discount_plans', function (Blueprint $table) {
            $table->increments('id');           
            $table->string('product');
            $table->integer('rankStartMonth');
            $table->integer('rankEndMonth');
            $table->integer('rankStartUser');
            $table->integer('rankEndUser');
            $table->string('status');
            $table->float('discount');
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
        //
          Schema::connection('briix')->drop('discount_plans');
    }
}
