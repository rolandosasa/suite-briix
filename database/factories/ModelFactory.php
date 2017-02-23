<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory->define(App\Models\Briix\Access\Enterprise\Enterprise::class, function (Faker\Generator $faker) {
    return [
    	'rfc' => $faker->isbn10,
        'name' => $faker->company,
        'contact' => $faker->name,
        'email' => $faker->safeEmail,
      	'phone' => $faker->phoneNumber,
      	'phone2' => $faker->phoneNumber,
      	'address' => $faker->address,
      	'image' => $faker->url,
    ];
});

$factory->define(App\Models\Briix\Access\RatePlan\RatePlan::class, function (Faker\Generator $faker) {
    return [
    	'description' => $faker->realText($maxNbChars = 10, $indexSize = 2),
        'product' => $faker->realText($maxNbChars = 10, $indexSize = 2),
        'cost' => $faker->randomFloat,
    ];
});

$factory->define(App\Models\Briix\Access\User\User::class, function (Faker\Generator $faker) {
		return [
				'name' => $faker->name,
				'email' => $faker->safeEmail,
				'password' => bcrypt(str_random(10)),
				'remember_token' => str_random(10),
		];
});



/*
|--------------------------------------------------------------------------
| Model Factories Crecursos
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Crecursos\Access\Concept\Concept::class, function (Faker\Generator $faker) {
		return [
				'name_concept' 	=> $faker->name,
				'project_id' 		=> App\Models\Crecursos\Access\Project\Project::all()->random()->id,
		];
});

$factory->define(App\Models\Crecursos\Access\Estimated\Estimated::class, function (Faker\Generator $faker) {
		return [
				'time_programmed' => $faker->randomDigit,
				'time_difference' => $faker->randomDigit,
				'advance_percent' => $faker ->randomDigit,
				'month_id' 				=> App\Models\Crecursos\Access\Month\Month::all()->random()->id,
				'concept_id' 			=> App\Models\Crecursos\Access\Concept\Concept::all()->random()->id,
		];
});
