<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RHCreatePersonalsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('cRecursos')->create('personals', function (Blueprint $table) {
			$table->increments('id');
			$table->string('id_personal')->unique();
			$table->string('name', 50);
			$table->string('firstlastname', 50);
			$table->string('secondlastname', 50);
			$table->char('gender', 1);
			$table->date('birthdate');
			$table->integer('age');
			$table->string('civil_status', 30);
			$table->string('birthplace', 80);
			$table->string('address', 200);
			$table->string('email', 30);
			$table->char('phone', 12);
			$table->string('photo', 15);
			$table->char('curp', 28);
			$table->char('imss', 15);
			$table->char('rfc', 15);
			$table->string('level_studies', 50);
			$table->string('school', 70);
			$table->string('career', 50);
			$table->char('identity_card', 10);
			$table->softDeletes();
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
		Schema::connection('cRecursos')->drop('personals');
	}
}
