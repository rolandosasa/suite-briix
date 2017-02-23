<?php

namespace App\Http\Controllers\Cmovil\Access\Enterprise;

use App\Models\Cmovil\Access\User\User;
use App\Models\Cmovil\Access\Enterprise\Enterprise;
use App\Models\Cmovil\Access\Role\Role;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Cmovil\Access\Enterprise\StoreEnterpriseRequest;
use App\Http\Requests\Cmovil\Access\Enterprise\ManageEnterpriseRequest;
use App\Http\Requests\Cmovil\Access\Enterprise\UpdateEnterpriseRequest;
use App\Repositories\Cmovil\Access\Enterprise\EnterpriseRepositoryContract;
use App\Repositories\Cmovil\Access\Permission\PermissionRepositoryContract;

/**
 * Class EnterpriseController
 * @package App\Http\Controllers\Access
 */
class EnterpriseController extends Controller
{
    /**
     * @var EnterpriseRepositoryContract
     */
    protected $enterprises;

    /**
     * @var PermissionRepositoryContract
     */
    protected $permissions;

    /**
     * @param EnterpriseRepositoryContract $enterprises
     * @param PermissionRepositoryContract $permissions
     */
    public function __construct(EnterpriseRepositoryContract $enterprises, PermissionRepositoryContract $permissions)
	{
        $this->enterprises = $enterprises;
        $this->permissions = $permissions;
    }

	/**
	 * @param ManageEnterpriseRequest $request
	 * @return mixed
	 */
	public function index(ManageEnterpriseRequest $request)
	{
        return view('cmovil.access.enterprises.index');
    }

	/**
	 * @param ManageEnterpriseRequest $request
	 * @return mixed
	 */
	public function get(ManageEnterpriseRequest $request)
	{
		return Datatables::of($this->enterprises->getForDataTable($request->get('trashed')))
        ->addColumn('actions', function($enterprise) {
                return $enterprise->action_buttons;
            })
			->make(true);
	}

    /**
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function create(ManageEnterpriseRequest $request)
    {
        return view('cmovil.access.enterprises.create')
            ->withPermissions($this->permissions->getAllPermissions())
			->withEnterpriseCount($this->enterprises->getCount());
    }

    /**
     * @param  StoreEnterpriseRequest $request
     * @return mixed
     */
    public function store(StoreEnterpriseRequest $request)
    {
        $this->enterprises->create($request->all());
        return redirect()->route('cmovil.access.enterprise.index')->withFlashSuccess(trans('alerts.Cmovil.enterprises.created'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  ManageEnterpriseRequest $request
     * @return mixed
     */
    public function edit(Enterprise $enterprise, ManageEnterpriseRequest $request)
    {
        return view('cmovil.access.enterprises.edit')
            ->withEnterprise($enterprise);
    }


    /**
     * @param  Enterprise $enterprise
     * @param  UpdateEnterpriseRequest $request
     * @return mixed
     */
    public function update(Enterprise $enterprise, UpdateEnterpriseRequest $request)
    {
        $this->enterprises->update($enterprise, $request->all());
        return redirect()->route('cmovil.access.enterprise.index')->withFlashSuccess(trans('alerts.Cmovil.enterprises.updated'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  ManageEnterpriseRequest $request
     * @return mixed
     */
    public function destroy(Enterprise $enterprise, ManageEnterpriseRequest $request)
    {
        $this->enterprises->destroy($enterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.cmovil.enterprises.deleted'));
        
    }

    /**
     * @param Enterprise $deletedEnterprise
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function delete(Enterprise $deletedEnterprise, ManageEnterpriseRequest $request)
    {
        $this->enterprises->delete($deletedEnterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.cmovil.enterprises.deleted_permanently'));
    }

    /**
     * @param Enterprise $deletedEnterprise
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function restore(Enterprise $deletedEnterprise, ManageEnterpriseRequest $request)
    {
        $this->enterprises->restore($deletedEnterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.cmovil.enterprises.restored'));
    }
    
    /**
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function deleted(ManageEnterpriseRequest $request)
    {
        return view('cmovil.access.enterprises.deleted');
    }

}