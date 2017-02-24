<?php

namespace App\Http\Controllers\Cmovil\Access\Line;

use App\Models\Cmovil\Access\User\User;
use App\Models\Cmovil\Access\Enterprise\Enterprise;
use App\Models\Cmovil\Access\Role\Role;
Use App\Models\Cmovil\Access\Line\Line;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Cmovil\Access\Line\StoreLineRequest;
use App\Http\Requests\Cmovil\Access\Line\ManageLineRequest;
use App\Http\Requests\Cmovil\Access\Line\UpdateLineRequest;
use App\Repositories\Cmovil\Access\Enterprise\EnterpriseRepositoryContract;
use App\Repositories\Cmovil\Access\Permission\PermissionRepositoryContract;

/**
 * Class EnterpriseController
 * @package App\Http\Controllers\Access
 */
class LineController extends Controller
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
	public function index(ManageLineRequest $request)
	{
        return view('cmovil.access.lines.index');
    }

	/**
	 * @param ManageEnterpriseRequest $request
	 * @return mixed
	 */
	public function get(ManageLineRequest $request)
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
    public function create(ManageLineRequest $request)
    {
        return view('cmovil.access.lines.create')
            ->withPermissions($this->permissions->getAllPermissions())
			->withEnterpriseCount($this->enterprises->getCount());
    }

    /**
     * @param  StoreEnterpriseRequest $request
     * @return mixed
     */
    public function store(StoreLineRequest $request)
    {
        dd($request);
        $this->enterprises->create($request->all());
        return redirect()->route('cmovil.access.line.index')->withFlashSuccess(trans('alerts.Cmovil.lines.created'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  ManageEnterpriseRequest $request
     * @return mixed
     */
    public function edit(Line $enterprise, ManageLineRequest $request)
    {
        return view('cmovil.access.lines.edit')
            ->withEnterprise($enterprise);
    }


    /**
     * @param  Enterprise $enterprise
     * @param  UpdateEnterpriseRequest $request
     * @return mixed
     */
    public function update(Line $enterprise, UpdateLineRequest $request)
    {
        $this->enterprises->update($enterprise, $request->all());
        return redirect()->route('cmovil.access.line.index')->withFlashSuccess(trans('alerts.Cmovil.lines.updated'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  ManageEnterpriseRequest $request
     * @return mixed
     */
    public function destroy(Line $enterprise, ManageLineRequest $request)
    {
        $this->enterprises->destroy($enterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.cmovil.lines.deleted'));
        
    }

    /**
     * @param Enterprise $deletedEnterprise
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function delete(Line $deletedEnterprise, ManageLineRequest $request)
    {
        $this->enterprises->delete($deletedEnterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.cmovil.lines.deleted_permanently'));
    }

    /**
     * @param Enterprise $deletedEnterprise
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function restore(Line $deletedEnterprise, ManageLineRequest $request)
    {
        $this->enterprises->restore($deletedEnterprise);
        return redirect()->back()->withFlashSuccess(trans('alerts.cmovil.lines.restored'));
    }
    
    /**
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function deleted(ManageLinesRequest $request)
    {
        return view('cmovil.access.lines.deleted');
    }

}