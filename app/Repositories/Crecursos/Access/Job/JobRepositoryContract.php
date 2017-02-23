<?php

namespace App\Repositories\Crecursos\Access\Job;

use App\Models\Crecursos\Access\Job\Job;

/**
 * Interface JobRepositoryContract
 * @package app\Repositories\Job
 */
interface JobRepositoryContract
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
    public function getAllJob($order_by = 'id');

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  Job $Job
     * @param  $input
     * @return mixed
     */
    public function update(Job $Job, $input);

    /**
     * @param  Job $Job
     * @return mixed
     */
    public function destroy(Job $Job);

    /**
     * @return mixed
     */
    
}