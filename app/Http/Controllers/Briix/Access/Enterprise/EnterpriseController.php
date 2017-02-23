<?php

namespace App\Http\Controllers\Briix\Access\Enterprise;

use App\Models\Briix\Access\User\User;
use App\Models\Briix\Access\Enterprise\Enterprise;
use App\Models\Briix\Access\Role\Role;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Briix\Access\Enterprise\StoreEnterpriseRequest;
use App\Http\Requests\Briix\Access\Enterprise\ManageEnterpriseRequest;
use App\Http\Requests\Briix\Access\Enterprise\UpdateEnterpriseRequest;
use App\Repositories\Briix\Access\Enterprise\EnterpriseRepositoryContract;
use App\Repositories\Briix\Access\Permission\PermissionRepositoryContract;

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
        return view('briix.access.enterprises.index');
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
        return view('briix.access.enterprises.create')
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
        return redirect()->route('briix.access.enterprise.index')->withFlashSuccess(trans('alerts.briix.enterprises.created'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  ManageEnterpriseRequest $request
     * @return mixed
     */
    public function edit(Enterprise $enterprise, ManageEnterpriseRequest $request)
    {
        return view('briix.access.enterprises.edit')
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
        return redirect()->route('briix.access.enterprise.index')->withFlashSuccess(trans('alerts.briix.enterprises.updated'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  ManageEnterpriseRequest $request
     * @return mixed
     */
    public function destroy(Enterprise $enterprise, ManageEnterpriseRequest $request)
    {
        $this->enterprises->destroy($enterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.enterprises.deleted'));
        
    }

    /**
     * @param Enterprise $deletedEnterprise
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function delete(Enterprise $deletedEnterprise, ManageEnterpriseRequest $request)
    {
        $this->enterprises->delete($deletedEnterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.enterprises.deleted_permanently'));
    }

    /**
     * @param Enterprise $deletedEnterprise
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function restore(Enterprise $deletedEnterprise, ManageEnterpriseRequest $request)
    {
        $this->enterprises->restore($deletedEnterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.briix.enterprises.restored'));
    }
    
    /**
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function deleted(ManageEnterpriseRequest $request)
    {
        return view('briix.access.enterprises.deleted');
    }

}