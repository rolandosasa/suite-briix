<?php

namespace App\Repositories\Briix\Access\Packet;

use App\Models\Briix\Access\Packet\Packet;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Briix\Access\Packet\PacketCreated;
use App\Events\Briix\Access\Packet\PacketDeleted;
use App\Events\Briix\Access\Packet\PacketUpdated;

/**
 * Class EloquentPacketRepository
 * @package app\Repositories\Packet
 */
class EloquentPacketRepository implements PacketRepositoryContract
{
    
	/**
     * @return mixed
     */
    public function getCount() {
        return Packet::count();
    }

	/**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getForDataTable() {
        return Packet::all();
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllPackets($order_by = 'sort', $sort = 'asc', $withProducts = false)
    {
        if ($withProducts) {
            return Packet::with('products')
                ->orderBy($order_by, $sort)
                ->get();
        }

        return Packet::orderBy($order_by, $sort)
            ->get();
    }

  


    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
		if (Packet::where('name', $input['name'])->first()) {
			throw new GeneralException(trans('exceptions.backend.access.packets.already_exists'));
		}

		//See if the plan has all access
		$all = $input['associated-products'] == 'all' ? true : false;

		if (! isset($input['products']))
			$input['products'] = [];

		//This config is only required if all is false
		if (! $all) {
			//See if the plan must contain a products as per config
			if (config('access.packet.packet_must_contain_product') && count($input['products']) == 0) {
				throw new GeneralException(trans('exceptions.backend.access.packets.needs_product'));
			}
		}

		DB::transaction(function() use ($input, $all) {
			$packet       = new Packet;
			$packet->name = $input['name'];
			$packet->sort = isset($input['sort']) && strlen($input['sort']) > 0 && is_numeric($input['sort']) ? (int)$input['sort'] : 0;

			//See if this plan has all permissions and set the flag on the plan
			$packet->all = $all;

			if ($packet->save()) {
				if (!$all) {
					$products = [];

					if (is_array($input['products']) && count($input['products'])) {
						foreach ($input['products'] as $perm) {
							if (is_numeric($perm)) {
								array_push($products, $perm);
							}
						}
					}

					$packet->attachProducts($products);
				}

				event(new PacketCreated($packet));
				return true;
			}

			throw new GeneralException(trans('exceptions.backend.access.packets.create_error'));
		});
    }

    /**
     * @param  Plan $plan
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(Packet $packet, $input)
    {
        //See if the plan has all access, administrator always has all access
        if ($packet->id == 1) {
            $all = true;
        } else {
            $all = $input['associated-products'] == 'all' ? true : false;
        }

        if (! isset($input['products']))
            $input['products'] = [];

        //This config is only required if all is false
        if (! $all) {
            //See if the packet must contain a permission as per config
            if (config('access.packets.packet_must_contain_product') && count($input['products']) == 0) {
                throw new GeneralException(trans('exceptions.backend.access.packets.needs_product'));
            }
        }

        $packet->name = $input['name'];
        $packet->sort = isset($input['sort']) && strlen($input['sort']) > 0 && is_numeric($input['sort']) ? (int) $input['sort'] : 0;

        //See if this plan has all permissions and set the flag on the plan
        $packet->all = $all;

		DB::transaction(function() use ($packet, $input, $all) {
			if ($packet->save()) {
				//If plan has all access detach all permissions because they're not needed
				if ($all) {
					$packet->products()->sync([]);
				} else {
					//Remove all plans first
					$packet->products()->sync([]);

					//Attach permissions if the plan does not have all access
					$products = [];

					if (is_array($input['products']) && count($input['products'])) {
						foreach ($input['products'] as $perm) {
							if (is_numeric($perm)) {
								array_push($products, $perm);
							}
						}
					}

					$packet->attachProducts($products);
				}

				event(new PacketUpdated($packet));
				return true;
			}

			throw new GeneralException(trans('exceptions.backend.access.packets.update_error'));
		});
    }

    /**
     * @param  Plan $plan
     * @throws GeneralException
     * @return bool
     */
    public function destroy(Packet $packet)
    {
      


		DB::transaction(function() use ($packet) {
			//Detach all associated plans
			$packet->products()->sync([]);

			if ($packet->delete()) {
				event(new PacketDeleted($packet));
				return true;
			}

			throw new GeneralException(trans('exceptions.backend.access.packets.delete_error'));
		});
    }

	/**
	 * @return mixed
	 */
	public function getDefaultUserPacket() {
		if (is_numeric(config('access.users.default_packet'))) {
			return Packet::where('id', (int) config('access.users.default_packet'))->first();
		}
		return Packet::where('name', config('access.users.default_packet'))->first();
	}
}