<?php

namespace App\Repositories\Crecursos\Access\Candidate;

use App\Models\Crecursos\Access\Candidate\Candidate;

/**
 * Interface CandidateRepositoryContract
 * @package app\Repositories\Candidate
 */
interface CandidateRepositoryContract
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
    public function getAllCandidate($order_by = 'id');

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  Candidate $Candidate
     * @param  $input
     * @return mixed
     */
    public function update(Candidate $Candidate, $input);

    /**
     * @param  Candidate $Candidate
     * @return mixed
     */
    public function destroy(Candidate $Candidate);

    /**
     * @return mixed
     */
    
}