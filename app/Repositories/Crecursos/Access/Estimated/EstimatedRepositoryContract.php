<?php

namespace App\Repositories\Crecursos\Access\Estimated;

use App\Models\Crecursos\Access\Estimated\Estimated;

/**
* Interface EstimatedRepositoryContract
* @package app\Repositories\Estimated
*/
interface EstimatedRepositoryContract
{

  /**
   * @return mixed
   */
  public function getCount();

  /**
   * @return mixed
   */
  public function getForDataTable();

  /**
   * @param  string  $order_by
   * @param  string  $sort
   * @param  bool    $withPermissions
   * @return mixed
   */
  public function getAllEstimateds($order_by = 'id', $sort = 'asc', $withConcept = false);

  /**
   * @param  $input
   * @return mixed
   */
  public function create($input);

  /**
   * @param  Estimated $Estimated
   * @param  $input
   * @return mixed
   */
  public function update(Estimated $estimated, $input);

  /**
   * @param  Estimated $Estimated
   * @return mixed
   */
  public function destroy(Estimated $estimated);
}