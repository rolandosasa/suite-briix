<?php

namespace App\Http\Controllers\Briix\Access\Packet;

use App\Models\Briix\Access\Packet\Packet;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Briix\Access\Packet\StorePacketRequest;
use App\Http\Requests\Briix\Access\Packet\ManagePacketRequest;
use App\Http\Requests\Briix\Access\Packet\UpdatePacketRequest;
use App\Repositories\Briix\Access\Packet\PacketRepositoryContract;
use App\Repositories\Briix\Access\Product\ProductRepositoryContract;

/**
 * Class PlanController
 * @package App\Http\Controllers\Access
 */
class PacketController extends Controller
{
    /**
     * @var PlanRepositoryContract
     */
    protected $packets;

    /**
     * @var PermissionRepositoryContract
     */
    protected $products;

    /**
     * @param PlanRepositoryContract       $packets
     * @param PermissionRepositoryContract $products
     */
    public function __construct(PacketRepositoryContract $packets, ProductRepositoryContract $products)
	{
        $this->packets = $packets;
        $this->products = $products;
    }

	/**
	 * @param ManagePacketRequest $request
	 * @return mixed
	 */
	public function index(ManagePacketRequest $request)
	{
        return view('briix.access.packets.index');
    }

	/**
	 * @param ManageRoleRequest $request
	 * @return mixed
	 */
	public function get(ManagePacketRequest $request)
	{
		return Datatables::of($this->packets->getForDataTable())
			->addColumn('products', function($packet) {
				$products = [];

				if ($packet->all)
					return '<span class="label label-success">' . trans('labels.general.all') . '</span>';

				if (count($packet->products) > 0) {
					foreach ($packet->products as $product) {
						array_push($products, $product->display_name);
					}

					return implode("<br/>", $products);
				} else {
					return '<span class="label label-danger">' . trans('labels.general.none') . '</span>';
				}
			})/*
			->addColumn('users', function($packet) {
				return $packet->users()->count();
			})*/
			->addColumn('actions', function($packet) {
				return $packet->action_buttons;
			})
			->make(true);
	}

    /**
     * @param ManagePacketRequest $request
     * @return mixed
     */
    public function create(ManagePacketRequest $request)
    {
     //   dd($this->products->getAllProducts());
        return view('briix.access.packets.create')
            ->withProducts($this->products->getAllProducts())
			->withPacketCount($this->packets->getCount());
    }

    /**
     * @param  StorePacketRequest $request
     * @return mixed
     */
    public function store(StorePacketRequest $request)
    {
        $this->packets->create($request->all());
        return redirect()->route('briix.access.packet.index')->withFlashSuccess(trans('alerts.briix.packets.created'));
    }

    /**
     * @param  Plan $plan
     * @param  ManagePacketRequest $request
     * @return mixed
     */
    public function edit(Packet $packet, ManagePacketRequest $request)
    {
        return view('briix.access.packets.edit')
            ->withPacket($packet)
            ->withPacketProducts($packet->products->lists('id')->all())
            ->withProducts($this->products->getAllProducts());
    }

    /**
     * @param  Plan $plan
     * @param  UpdatePlanRequest $request
     * @return mixed
     */
    public function update(Packet $packet, UpdatePacketRequest $request)
    {
        $this->packets->update($packet, $request->all());
        return redirect()->route('briix.access.packet.index')->withFlashSuccess(trans('alerts.briix.packets.updated'));
    }

    /**
     * @param  Plan $plan
     * @param  ManagePacketRequest $request
     * @return mixed
     */
    public function destroy(Packet $packet, ManagePacketRequest $request)
    {
        $this->packets->destroy($packet);
        return redirect()->route('briix.access.packet.index')->withFlashSuccess(trans('alerts.briix.packets.deleted'));
    }
}