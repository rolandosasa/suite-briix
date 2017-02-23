<?php

namespace App\Models\Briix\Access\Contract\Traits\Relationship;

/**
 * Class ContractRelationship
 * @package App\Models\Briix\Access\Contract\Traits\Relationship
 */
trait ContractRelationship
{
	/**
     * Relación Usuario - Contrato. 1-N.
     * 
     * @return mixed
     */
    public function enterprise()
    {
        return $this->belongsTo(config('access.enterprise'), 'enterprise_id');
    }

    public function client()
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'client_id');
    }

    public function executive()
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'executive_id');
    }

    public function rate_plan()
    {
        return $this->belongsTo(config('access.rate_plan'), 'rate_plan_id');
    }

    public function users()
    {
        return $this->hasMany(config('auth.providers.users.model'), 'user_id');
    }

    public function packets()
    {
        return $this->belongsToMany(config('access.packet'), config('access.assigned_packets_table'), 'contract_id', 'packet_id');
    }
    

}