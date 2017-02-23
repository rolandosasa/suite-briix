<?php

namespace App\Repositories\Crecursos\Access\Personal;

use App\Models\Crecursos\Access\Personal\Personal;

/**
 * Interface PersonalRepositoryContract
 * @package app\Repositories\Personal
 */
interface PersonalRepositoryContract
{
    /**
     * @return mixed
     */
   
    /**
     * @param int $status
     * @param bool $trashed
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false);
    /**
     * @param int $status
     * @param bool $trashed
     * @return mixed
     */
     
    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllPersonal($order_by = 'id', $sort = 'asc', $withPermissions = false);
    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);
    /**
     * @param  DtuExtension $DtuExtension
     * @param  $input
     * @return mixed
     */
    public function update(Personal $personal, $input);
    /**
     * @param  DtuExtension $DtuExtension
     * @return mixed
     */
    public function destroy(Personal $personal);
    /**
     * @param  DtuExtension $DtuExtension
     * @return mixed
     */
    public function restore(Personal $personal);
    /**
     * @return mixed
     */
}