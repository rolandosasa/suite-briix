<?php

use Illuminate\Database\Seeder;

class RHConceptTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(App\Models\Crecursos\Access\Concept\Concept::class, 50)-> create();
  }
}
