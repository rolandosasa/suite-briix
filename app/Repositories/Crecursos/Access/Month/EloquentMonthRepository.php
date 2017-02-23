<?php

namespace App\Repositories\Crecursos\Access\Month;

use App\Models\Crecursos\Access\Project\Project;
use App\Models\Crecursos\Access\Month\Month;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
/**
* Class EloquentMonthRepository
* @package app\Repositories\Month
*/
class EloquentMonthRepository implements MonthRepositoryContract
{
  /**
   * @return mixed
   */
  public function getCount() {
    return Month::count();
  }

  /**
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
  public function getForDataTable($trashed = false) 
  {
    
  }
  
  public function getAllMonths($order_by = 'sort', $sort = 'asc')
  {
    $months = Month::first();

    return $months;
  }

  
  public function create($input)
  {
    
  }

  public function update(Month $Month, $input)
  {
    
  }

  public function destroy(Month $month)
  {

  }

  /**
   * @param Month
   * @throws GeneralException
   * @return bool
   */
 
}