<?php

namespace App\Repositories\Briix\Access\Contract;

use App\Models\Briix\Access\Contract\Contract;

/**
 * Interface ContractRepositoryContract
 * @package app\Repositories\Contract
 */
interface ContractRepositoryContract
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
    public function getAllContracts($order_by = 'id', $sort = 'asc', $withPermissions = false);

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input, $plans);

    /**
     * @param  Contract $contract
     * @param  $input
     * @return mixed
     */
    public function update(Contract $contract, $input, $plans);

    /**
     * @param  Contract $contract
     * @return mixed
     */
    public function destroy(Contract $contract);

    /**
     * @param  Contract $contract
     * @return mixed
     */
    public function delete(Contract $contract);

    /**
     * @param  Contract $contract
     * @return mixed
     */
    public function restore(Contract $contract);

    /**
     * @return mixed
     */
    public function getDefaultUserRole();
}