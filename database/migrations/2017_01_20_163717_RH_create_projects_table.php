<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RHCreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cRecursos')->create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_project');
            $table->string('description');
            $table->string('contractor');
            $table->date('date_init');
            $table->date('date_end');
            $table->double('advance');
            $table->double('total_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('cRecursos')->drop('projects');
    }
}
