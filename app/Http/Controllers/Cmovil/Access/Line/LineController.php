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
use App\Repositories\Cmovil\Access\Line\LineRepositoryContract;
use App\Repositories\Cmovil\Access\Role\RoleRepositoryContract;
use App\Repositories\Cmovil\Access\User\UserRepositoryContract;
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
    protected $lines;


    /**
     * @var PermissionRepositoryContract
     */
    protected $permissions;


    /**
     * @var PermissionRepositoryContract
     */
   // protected $roles;
    protected $user;

    /**
     * @param EnterpriseRepositoryContract $enterprises
     * @param PermissionRepositoryContract $permissions
     */
    public function __construct(LineRepositoryContract $lines, PermissionRepositoryContract $permissions, UserRepositoryContract $users)
	{
        $this->lines = $lines;
        $this->permissions = $permissions;
        //$this->roles = $roles;
        $this->users = $users;
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
		return Datatables::of($this->lines->getForDataTable($request->get('trashed')))
        ->addColumn('actions', function($line) {
                return $line->action_buttons;
            })
			->make(true);
	}

    /**
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function create(ManageLineRequest $request)
    {
            //return view('cmovil.access.lines.create')
            //->withPermissions($this->permissions->getAllPermissions())
			//->withLineCount($this->lines->getCount());
        //$enterprises = Enterprise::list('rfc', 'id');
        $enterprises = Enterprise::pluck("name","id")->all();
        $executives = User::pluck('name', 'id')->all();
      // dd($executives);
        //return view('cmovil.access.lines.create', compact('enterprises'))
         //   ->withRoles($this->roles->getAllRoles('sort', 'asc', true));

        return view('cmovil.access.lines.create')
            ->withEnterprises($enterprises)
            ->withExecutives($executives ,'sort', 'asc', true);
           
          
    }

    /**
     * @param  StoreEnterpriseRequest $request
     * @return mixed
     */
    public function store(StoreLineRequest $request)
    {
        //dd($request);
        $this->lines->create($request->all());
        return redirect()->route('cmovil.access.line.index')->withFlashSuccess(trans('alerts.Cmovil.lines.created'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  ManageEnterpriseRequest $request
     * @return mixed
     */
    public function edit(Line $line, ManageLineRequest $request)
    {
        return view('cmovil.access.lines.edit')
            ->withLine($line);
    }


    /**
     * @param  Enterprise $enterprise
     * @param  UpdateEnterpriseRequest $request
     * @return mixed
     */
    public function update(Line $line, UpdateLineRequest $request)
    {
        $this->lines->update($line, $request->all());
        return redirect()->route('cmovil.access.line.index')->withFlashSuccess(trans('alerts.Cmovil.lines.updated'));
    }

    /**
     * @param  Enterprise $enterprise
     * @param  ManageEnterpriseRequest $request
     * @return mixed
     */
    public function destroy(Line $line, ManageLineRequest $request)
    {
        $this->lines->destroy($line);
        return redirect()->back()->withFlashSuccess(trans('alerts.cmovil.lines.deleted'));
        
    }

    /**
     * @param Enterprise $deletedEnterprise
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function delete(Line $deletedLine, ManageLineRequest $request)
    {
        $this->lines->delete($deletedLine);
        return redirect()->back()->withFlashSuccess(trans('alerts.cmovil.lines.deleted_permanently'));
    }

    /**
     * @param Enterprise $deletedEnterprise
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function restore(Line $deletedLine, ManageLineRequest $request)
    {
        $this->lines->restore($deletedLine);
        return redirect()->back()->withFlashSuccess(trans('alerts.cmovil.lines.restored'));
    }
    
    /**
     * @param ManageEnterpriseRequest $request
     * @return mixed
     */
    public function deleted(ManageLineRequest $request)
    {
        return view('cmovil.access.lines.deleted');
    }

}