<?php

namespace App\Http\Controllers\Briix\Access\Contract;

use App\Models\Briix\Access\Contract\Contract;
use App\Models\Briix\Access\User\User;
use App\Models\Briix\Access\Enterprise\Enterprise;
use App\Models\Briix\Access\RatePlan\RatePlan;
use App\Models\Briix\Access\Role\Role;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Briix\Access\Contract\StoreContractRequest;
use App\Http\Requests\Briix\Access\Contract\ManageContractRequest;
use App\Http\Requests\Briix\Access\Contract\UpdateContractRequest;
use App\Repositories\Briix\Access\Contract\ContractRepositoryContract;
use App\Repositories\Briix\Access\Product\ProductRepositoryContract;
use App\Repositories\Briix\Access\Packet\PacketRepositoryContract;
use App\Repositories\Briix\Access\User\UserRepositoryContract;
use Auth;

/**
 * Class ContractController
 * @package App\Http\Controllers\Access
 */
class ContractController extends Controller
{
    /**
     * @var PermissionRepositoryContract
     */
    protected $contracts;
    protected $products;
    protected $packets;
    protected $user;
    

    /**
     * @param ContractRepositoryContract $contracts
     * @param PermissionRepositoryContract $products
     */
    public function __construct(ContractRepositoryContract $contracts, ProductRepositoryContract $products, PacketRepositoryContract $packets, UserRepositoryContract $users)
	{
        $this->contracts = $contracts;
        $this->products = $products;
        $this->packets = $packets;
        $this->users = $users;
    }

	/**
	 * @param ManageContracteRequest $request
	 * @return mixed
	 */
	public function index(ManageContractRequest $request)
	{  
        return view('briix.access.contracts.index');
    }

	/**
	 * @param ManageContractRequest $request
	 * @return mixed
	 */
	public function get(ManageContractRequest $request)
	{
		return Datatables::of($this->contracts->getForDataTable($request->get('trashed')))
        ->addColumn('plans', function($contract) {

                $user = User::find($contract->client_id);
                $plans = [];

                if ($user->plans()->count() > 0) {
                    foreach ($user->plans as $plan) {
                        array_push($plans, $plan->name);
                    }

                    return implode("<br/>", $plans);
                } else {
                    return trans('labels.general.none');
                }
            })
        ->addColumn('actions', function($contract) {
                return $contract->action_buttons;
            })
			->make(true);
	}

    /**
     * @param ManageContractRequest $request
     * @return mixed
     */
    public function create(ManageContractRequest $request)
    {
        //$enterprises = Enterprise::lists('name', 'id');

        $enterprises = Enterprise::pluck("name","id")->all();
        $executives = User::where('enterprise_id',1)->pluck('name', 'id')->all();
        $ratePlans= RatePlan::pluck("description", "id")->all();
        //dd($executives);

        return view('briix.access.contracts.create')
            ->withEnterprises($enterprises)
            ->withExecutives($executives)
            ->withRatePlans($ratePlans)
            ->withProducts($this->products->getAllProducts())
			->withEnterpriseCount($this->contracts->getCount())
            ->withPackets($this->packets->getAllPackets('sort', 'asc', true));
    }

    /**
     * @param  StoreContractRequest $request
     * @return mixed
     */
    public function store(StoreContractRequest $request)
    {
        $this->contracts->create(
            $request->except('assignees_packets'),
            $request->only('assignees_packets')
        );
        return redirect()->route('briix.access.contract.index')->withFlashSuccess(trans('alerts.briix.contracts.created'));
    }

    /**
     * @param  Contract $contract
     * @param  ManageContractRequest $request
     * @return mixed
     */
    public function edit(Contract $contract, ManageContractRequest $request)
    {   
        $user = User::find($contract->client_id);
        $enterprises = Enterprise::pluck("name","id")->all();
        $executives = User::where('enterprise_id',1)->pluck('name', 'id')->all();
        $clients = User::where('enterprise_id', $contract->enterprise_id)->pluck('name', 'id')->all();
        $ratePlans= RatePlan::pluck("description", "id")->all();
        //dd($executives);
        return view('briix.access.contracts.edit')
            ->withEnterprises($enterprises)
            ->withExecutives($executives)
            ->withRatePlans($ratePlans)
            ->withContract($contract)
            ->withClients($clients)
            ->withUsers($user)
            ->withUserPlans($user->plans->lists('id')->all())
            ->withPlans($this->plans->getAllPlans('sort', 'asc', true));
    }
    

    /**
     * @param  Contract $contract
     * @param  UpdateContractRequest $request
     * @return mixed
     */
    public function update(Contract $contract, UpdateContractRequest $request)
    {
        $this->contracts->update($contract,
            $request->except('assignees_plans'),
            $request->only('assignees_plans')
        );
        return redirect()->route('briix.access.contract.index')->withFlashSuccess(trans('alerts.Briix.contracts.updated'));
    }

    /**
     * @param  Contract $contract
     * @param  ManageContractRequest $request
     * @return mixed
     */
    public function destroy(Contract $contract, ManageContractRequest $request)
    {
        $this->contracts->destroy($contract);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.contracts.deleted'));
        
    }

    /**
     * @param Contract $deletedContract
     * @param ManageContractRequest $request
     * @return mixed
     */
    public function delete(Contract $deletedContract, ManageContractRequest $request)
    {
        $this->contracts->delete($deletedContract);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.contracts.deleted_permanently'));
    }

    /**
     * @param Contract $deletedContract
     * @param ManageContractRequest $request
     * @return mixed
     */
    public function restore(Contract $deletedContract, ManageContractRequest $request)
    {
        $this->contracts->restore($deletedContract);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.contracts.restored'));
    }
    
    /**
     * @param ManageContractRequest $request
     * @return mixed
     */
    public function deleted(ManageContractRequest $request)
    {
        return view('briix.access.contracts.deleted');
    }

    public function union(ManageContractRequest $request)
    {
        $user = Auth::user()->enterprise->contracts;
        dd($user);
        return view('briix.access.contracts.index');
    }

}