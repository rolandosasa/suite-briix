<?php

namespace App\Http\Controllers\Briix\Access\DiscountPlan;

use App\Models\Briix\Access\User\User;
use App\Models\Briix\Access\DiscountPlan\DiscountPlan;
use App\Models\Briix\Access\Role\Role;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Briix\Access\DiscountPlan\StoreDiscountPlanRequest;
use App\Http\Requests\Briix\Access\DiscountPlan\ManageDiscountPlanRequest;
use App\Http\Requests\Briix\Access\DiscountPlan\UpdateDiscountPlanRequest;
use App\Repositories\Briix\Access\DiscountPlan\DiscountPlanRepositoryContract;
use App\Repositories\Briix\Access\Permission\PermissionRepositoryContract;

/**
 * Class DiscountPlanController
 * @package App\Http\Controllers\Access
 */
class DiscountPlanController extends Controller
{
    /**
     * @var DiscountPlanRepositoryContract
     */
    protected $discountPlans;

    /**
     * @var PermissionRepositoryContract
     */
    protected $permissions;

    /**
     * @param DiscountPlanRepositoryContract       $ratePlans
     * @param PermissionRepositoryContract $permissions
     */
    public function __construct(DiscountPlanRepositoryContract $discountPlans, PermissionRepositoryContract $permissions)
	{
        $this->discountPlans = $discountPlans;
        $this->permissions = $permissions;
    }

	/**
	 * @param ManageDiscountPlanRequest $request
	 * @return mixed
	 */
	public function index(ManageDiscountPlanRequest $request)
	{
        return view('briix.access.discountPlans.index');
    }

	/**
	 * @param ManageDiscountPlanRequest $request
	 * @return mixed
	 */
    public function get(ManageDiscountPlanRequest $request)
	{
		return Datatables::of($this->discountPlans->getForDataTable($request->get('trashed')))
        ->addColumn('rankStartEndUser', function($discountPlan) {

                if ($discountPlan->rankStartUser >= 0){

                    return '<span class="label label-success">' .$discountPlan->rankStartUser. ' a '.$discountPlan->rankEndUser. ' usuario(s)' . '</span>';
                }
                 else {
                    return '<span class="label label-danger">' . trans('labels.general.none') . '</span>';
                }
            })
        ->addColumn('rankStartEndMonth', function($discountPlan) {

                if ($discountPlan->rankStartMonth >= 0){

                    return '<span class="label label-success">' .$discountPlan->rankStartMonth. ' a '.$discountPlan->rankEndMonth. ' mes(es)' . '</span>';
                }
                 else {
                    return '<span class="label label-danger">' . trans('labels.general.none') . '</span>';
                }
            })
        ->addColumn('discount', function($discountPlan) {
                return '<span class="label label-success">' .$discountPlan->discount. '% </span>';
                
            })
        ->addColumn('actions', function($discountPlan) {
                return $discountPlan->action_buttons;
            })
			->make(true);
	}

    /**
     * @param ManageDiscountPlanRequest $request
     * @return mixed
     */
    public function create(ManageDiscountPlanRequest $request)
    {
        return view('briix.access.discountPlans.create')
            ->withPermissions($this->permissions->getAllPermissions());
    }

    /**
     * @param  StoreDiscountPlanRequest $request
     * @return mixed
     */
    public function store(StoreDiscountPlanRequest $request)
    {
        $this->discountPlans->create($request->all());
        return redirect()->route('briix.access.discountPlan.index')->withFlashSuccess(trans('alerts.briix.discountPlans.created'));
    }

    /**
     * @param  DiscountPlan $DiscountPlan
     * @param  ManageDiscountPlanRequest $request
     * @return mixed
     */
    public function edit(DiscountPlan $discountPlan, ManageDiscountPlanRequest $request)
    {//dd($ratePlans);
        return view('briix.access.discountPlans.edit', compact('discountPlan'));
    }

    /**
     * @param  DiscountPlan $discountPlan
     * @param  UpdateDiscountPlanRequest $request
     * @return mixed
     */
    public function update(DiscountPlan $discountPlan, UpdateDiscountPlanRequest $request)
    {
        $this->discountPlans->update($discountPlan, $request->all());
        return redirect()->route('briix.access.discountPlan.index')->withFlashSuccess(trans('alerts.briix.discountPlans.updated'));
    }

    /**
     * @param  DiscountPlan $discountPlan
     * @param  ManageDiscountPlanRequest $request
     * @return mixed
     */
    public function destroy(DiscountPlan $discountPlan, ManageDiscountPlanRequest $request)
    {
        $this->discountPlans->destroy($discountPlan);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.discountPlans.deleted'));
        
    }

    /**
     * @param DiscountPlan $deletedDiscountPlan
     * @param ManageDiscountPlanRequest $request
     * @return mixed
     */
    public function delete(DiscountPlan $deletedDiscountPlan, ManageDiscountPlanRequest $request)
    {
        $this->discountPlans->delete($deletedDicountPlan);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.discountPlans.deleted_permanently'));
    }

    /**
     * @param DiscountPlan $deletedDiscountPlan
     * @param ManageDiscountPlanRequest $request
     * @return mixed
     */
    public function restore(DiscountPlan $deletedDiscountPlan, ManagePlanPlanRequest $request)
    {
        $this->discountPlans->restore($deletedDiscountPlan);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.discountPlans.restored'));
    }
    
    /**
     * @param ManageDiscountPlanRequest $request
     * @return mixed
     */
    public function deleted(ManageDiscountPlanRequest $request)
    {
        return view('briix.access.discountPlans.deleted');
    }

}