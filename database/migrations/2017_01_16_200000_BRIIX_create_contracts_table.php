<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BRIIXCreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::connection('briix')->create('contracts', function (Blueprint $table) {
            $table->increments('id'); 
             //Clave foranea referencia al modelo empresas
            $table->integer('enterprise_id')->unsigned();
            $table->foreign('enterprise_id')->references('id')->on('enterprises')
                    ->onDelete('cascade');   

             //Clave foranea referencia al modelo Usuario user acceso por defecto.
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users');


             //Clave foranea referencia al modelo Usuarios que crea contrato
            $table->integer('executive_id')->unsigned();
            $table->foreign('executive_id')->references('id')->on('users');

            $table->integer('quantity');
            $table->string('typePay');
            
            $table->integer('rate_plan_id')->unsigned();
            $table->foreign('rate_plan_id')->references('id')->on('rate_plans');

            $table->integer('payment_id');
            $table->string('estatus');
            $table->string('database');
            $table->tinyInteger('status')->default(1)->unsigned();

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
         Schema::connection('briix')->drop('contracts');
    }
}
