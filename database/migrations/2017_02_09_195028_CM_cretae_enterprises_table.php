<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CMCretaeEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::connection('cmovil')->create('enterprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
            $table->string('contact');
            $table->string('email');
            $table->string('phone');
            $table->string('phone2');
            $table->string('address');            
            $table->string('image');
            $table->string('rfc')->unique();
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

        Schema::connection('cmovil')->drop('enterprises');
    }
}
