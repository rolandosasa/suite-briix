<?php

namespace App\Repositories\Crecursos\Access\Requirements;

use App\Models\Crecursos\Access\Requirements\Requirements;

/**
 * Interface RequirementsRepositoryContract
 * @package app\Repositories\Requirements
 */
interface RequirementsRepositoryContract
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
    public function getAllRequirements($order_by = 'id');

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  Requirements $Requirements
     * @param  $input
     * @return mixed
     */
    public function update(Requirements $Requirements, $input);

    /**
     * @param  Requirements $Requirements
     * @return mixed
     */
    public function destroy(Requirements $Requirements);

    /**
     * @return mixed
     */
    
}