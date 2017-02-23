<?php

namespace App\Repositories\Crecursos\Access\Project;

use App\Models\Crecursos\Access\Project\Project;

/**
 * Interface ProjectsRepositoryContract
 * @package app\Repositories\Projects
 */
interface ProjectRepositoryContract
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
    public function getAllProjects($order_by = 'id', $sort = 'asc', $withConcepts = false);

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input, $concepts);

    /**
     * @param  Projects $Projects
     * @param  $input
     * @return mixed
     */
    public function update(Project $project, $input, $conceptsUp, $concepts);

    /**
     * @param  Projects $Projects
     * @return mixed
     */
    public function destroy(Project $project);

    /**
     * @return mixed
     */
    
}