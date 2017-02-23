<?php

namespace App\Http\Controllers\Briix\Access\RatePlan;

use App\Models\Briix\Access\User\User;
use App\Models\Briix\Access\RatePlan\RatePlan;
use App\Models\Briix\Access\Role\Role;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Briix\Access\RatePlan\StoreRatePlanRequest;
use App\Http\Requests\Briix\Access\RatePlan\ManageRatePlanRequest;
use App\Http\Requests\Briix\Access\RatePlan\UpdateRatePlanRequest;
use App\Repositories\Briix\Access\RatePlan\RatePlanRepositoryContract;
use App\Repositories\Briix\Access\Permission\PermissionRepositoryContract;

/**
 * Class RatePlanController
 * @package App\Http\Controllers\Access
 */
class RatePlanController extends Controller
{
    /**
     * @var RatePlanRepositoryContract
     */
    protected $ratePlans;

    /**
     * @var PermissionRepositoryContract
     */
    protected $permissions;

    /**
     * @param RatePlanRepositoryContract       $ratePlans
     * @param PermissionRepositoryContract $permissions
     */
    public function __construct(RatePlanRepositoryContract $ratePlans, PermissionRepositoryContract $permissions)
	{
        $this->ratePlans = $ratePlans;
        $this->permissions = $permissions;
    }

	/**
	 * @param ManageRatePlanRequest $request
	 * @return mixed
	 */
	public function index(ManageRatePlanRequest $request)
	{
        return view('briix.access.ratePlans.index');
    }

	/**
	 * @param ManageRatePlanRequest $request
	 * @return mixed
	 */
	public function get(ManageRatePlanRequest $request)
	{
		return Datatables::of($this->ratePlans->getForDataTable($request->get('trashed')))
        ->addColumn('actions', function($RatePlan) {
                return $RatePlan->action_buttons;
            })
			->make(true);
	}

    /**
     * @param ManageRatePlanRequest $request
     * @return mixed
     */
    public function create(ManageRatePlanRequest $request)
    {
        return view('briix.access.ratePlans.create')
            ->withPermissions($this->permissions->getAllPermissions());
    }

    /**
     * @param  StoreRatePlanRequest $request
     * @return mixed
     */
    public function store(StoreRatePlanRequest $request)
    {
        $this->ratePlans->create($request->all());
        return redirect()->route('briix.access.ratePlan.index')->withFlashSuccess(trans('alerts.briix.ratePlans.created'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  ManageRatePlanRequest $request
     * @return mixed
     */
    public function edit(RatePlan $ratePlan, ManageRatePlanRequest $request)
    {//dd($ratePlans);
        return view('briix.access.ratePlans.edit', compact('ratePlan'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  UpdateRatePlanRequest $request
     * @return mixed
     */
    public function update(RatePlan $ratePlan, UpdateRatePlanRequest $request)
    {
        $this->ratePlans->update($ratePlan, $request->all());
        return redirect()->route('briix.access.ratePlan.index')->withFlashSuccess(trans('alerts.briix.ratePlans.updated'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  ManageRatePlanRequest $request
     * @return mixed
     */
    public function destroy(RatePlan $ratePlan, ManageRatePlanRequest $request)
    {
        $this->ratePlans->destroy($ratePlan);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.ratePlans.deleted'));
        
    }

    /**
     * @param Enterprise $deletedEnterprise
     * @param ManageRatePlanRequest $request
     * @return mixed
     */
    public function delete(Enterprise $deletedEnterprise, ManageRatePlanRequest $request)
    {
        $this->ratePlans->delete($deletedEnterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.ratePlans.deleted_permanently'));
    }

    /**
     * @param Enterprise $deletedEnterprise
     * @param ManageRatePlanRequest $request
     * @return mixed
     */
    public function restore(Enterprise $deletedEnterprise, ManageRatePlanRequest $request)
    {
        $this->ratePlans->restore($deletedEnterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.ratePlans.restored'));
    }
    
    /**
     * @param ManageRatePlanRequest $request
     * @return mixed
     */
    public function deleted(ManageRatePlanRequest $request)
    {
        return view('briix.access.ratePlans.deleted');
    }

}