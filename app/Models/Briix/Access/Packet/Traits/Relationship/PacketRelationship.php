<?php

namespace App\Models\Briix\Access\Packet\Traits\Relationship;

/**
 * Class PlanRelationship
 * @package App\Models\Briix\Access\Plan\Traits\Relationship
 */
trait PacketRelationship
{
    /**
     * @return mixed
     */
   public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'), config('access.packet_product_table'), 'packet_id', 'user_id');
    }

    /**
     * @return mixed
     */
    public function products()
    {
        return $this->belongsToMany(config('access.product'), config('access.packet_product_table'), 'packet_id', 'product_id')
            ->orderBy('display_name', 'asc');
    }

    public function contracts()
    {
        return $this->belongsToMany(config('auth.providers.packets.model'), config('access.assigned_packets_table'), 'packet_id', 'contract_id');
    }

}