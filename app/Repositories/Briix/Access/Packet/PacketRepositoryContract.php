<?php

namespace App\Repositories\Briix\Access\Packet;

use App\Models\Briix\Access\Packet\Packet;

/**
 * Interface PacketRepositoryContract
 * @package app\Repositories\Packet
 */
interface PacketRepositoryContract
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
    public function getAllPackets($order_by = 'id', $sort = 'asc', $withPermissions = false);

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  Packet $packet
     * @param  $input
     * @return mixed
     */
    public function update(Packet $packet, $input);

    /**
     * @param  Packet $packet
     * @return mixed
     */
    public function destroy(Packet $packet);

	/**
     * @return mixed
     */
    public function getDefaultUserPacket();
}