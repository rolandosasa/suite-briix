<?php

namespace App\Repositories\Crecursos\Access\Compettition;

use App\Models\Crecursos\Access\Compettition\Compettition;

/**
 * Interface CompettitionRepositoryContract
 * @package app\Repositories\Compettition
 */
interface CompettitionRepositoryContract
{

    /**
     * @return mixed
     */
    public function getCount();

    /**
     * @return mixed
     */
    public function getForDataTable($trashed = false);

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllCompettition($order_by = 'id');

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  Compettition $Compettition
     * @param  $input
     * @return mixed
     */
    public function update(Compettition $Compettition, $input);

    /**
     * @param  Compettition $Compettition
     * @return mixed
     */
    public function destroy(Compettition $Compettition);

    /**
     * @return mixed
     */
    
}