<?php

use Illuminate\Database\Seeder;

class RHEstimatedTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(App\Models\Crecursos\Access\Estimated\Estimated::class, 100)-> create();
  }
}
