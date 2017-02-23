<?php

namespace App\Models\Briix\Access\Product\Traits\Relationship;

/**
 * Class PermissionRelationship
 * @package App\Models\Briix\Access\Product\Traits\Relationship
 */
trait ProductRelationship
{
    /**
     * @return mixed
     */
    public function packets()
    {
        return $this->belongsToMany(config('access.packet'), config('access.packet_product_table'), 'product_id', 'packet_id');
    }
}