<?php

namespace App\Models\Briix\Access\Packet\Traits;

/**
 * Class PlanAccess
 * @package App\Models\Briix\Access\Plan\Traits
 */
trait PacketAccess
{
    /**
     * Save the inputted products.
     *
     * @param  mixed  $inputPermissions
     * @return void
     */
    public function saveProducts($inputProducts)
    {
        if (! empty($inputProducts)) {
            $this->permissions()->sync($inputProducts);
        } else {
            $this->permissions()->detach();
        }
    }

    /**
     * Attach permission to current role.
     *
     * @param  object|array $permission
     * @return void
     */
    public function attachProduct($product)
    {
        if (is_object($product)) {
            $product = $product->getKey();
        }

        if (is_array($product)) {
            $product = $product['id'];
        }

        $this->products()->attach($product);
    }

    /**
     * Detach permission form current role.
     *
     * @param  object|array $permission
     * @return void
     */
    public function detachProduct($product)
    {
        if (is_object($product)) {
            $product = $product->getKey();
        }

        if (is_array($product)) {
            $product = $product['id'];
        }

        $this->products()->detach($product);
    }

    /**
     * Attach multiple permissions to current role.
     *
     * @param  mixed  $permissions
     * @return void
     */
    public function attachProducts($products)
    {
        foreach ($products as $product) {
            $this->attachProduct($product);
        }
    }

    /**
     * Detach multiple permissions from current role
     *
     * @param  mixed  $permissions
     * @return void
     */
    public function detachProducts($products)
    {
        foreach ($products as $product) {
            $this->detachProduct($product);
        }
    }
}