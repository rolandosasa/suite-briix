<?php

namespace App\Repositories\Crecursos\Access\Department;

use App\Models\Crecursos\Access\Department\Department;

/**
 * Interface DepartmentRepositoryContract
 * @package app\Repositories\Department
 */
interface DepartmentRepositoryContract
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
    public function getAllDepartments($order_by = 'id', $sort = 'asc', $withDepartments = false);

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  Department $Department
     * @param  $input
     * @return mixed
     */
    public function update(Department $department, $input);

    /**
     * @param  Department $Department
     * @return mixed
     */
    public function destroy(Department $department);

    /**
     * @return mixed
     */
    
}