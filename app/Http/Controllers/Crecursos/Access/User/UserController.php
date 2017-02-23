<?php

namespace App\Http\Controllers\Crecursos\Access\User;

use App\Models\Crecursos\Access\User\User;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Crecursos\Access\User\StoreUserRequest;
use App\Http\Requests\Crecursos\Access\User\ManageUserRequest;
use App\Http\Requests\Crecursos\Access\User\UpdateUserRequest;
use App\Repositories\Crecursos\Access\User\UserRepositoryContract;
use App\Repositories\Crecursos\Access\Role\RoleRepositoryContract;
use App\Http\Requests\Crecursos\Access\User\UpdateUserPasswordRequest;
use App\Repositories\Frontend\Access\User\UserRepositoryContract as FrontendUserRepositoryContract;

/**
 * Class UserController
 */
class UserController extends Controller
{
    /**
     * @var UserRepositoryContract
     */
    protected $users;

    /**
     * @var RoleRepositoryContract
     */
    protected $roles;

    /**
     * @param UserRepositoryContract $users
     * @param RoleRepositoryContract $roles
     */
    public function __construct(UserRepositoryContract $users, RoleRepositoryContract $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }

	/**
     * @param ManageUserRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request)
    {
        return view('crecursos.access.index');
    }

	/**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function get(ManageUserRequest $request) {
        return Datatables::of($this->users->getForDataTable($request->get('status'), $request->get('trashed')))
            ->editColumn('confirmed', function($user) {
                return $user->confirmed_label;
            })
            ->addColumn('roles', function($user) {
                $roles = [];

                if ($user->roles()->count() > 0) {
                    foreach ($user->roles as $role) {
                        array_push($roles, $role->name);
                    }

                    return implode("<br/>", $roles);
                } else {
                    return trans('labels.general.none');
                }
            })
            ->addColumn('actions', function($user) {
                return $user->action_buttons;
            })
            ->make(true);
    }

	/**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function create(ManageUserRequest $request)
    {
        return view('crecursos.access.create')
            ->withRoles($this->roles->getAllRoles('sort', 'asc', true));
    }

	/**
     * @param StoreUserRequest $request
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $this->users->create(
            $request->except('assignees_roles'),
            $request->only('assignees_roles')
        );
        return redirect()->route('crecursos.access.user.index')->withFlashSuccess(trans('alerts.crecursos.users.created'));
    }

	/**
     * @param User $user
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function edit(User $user, ManageUserRequest $request)
    {
        return view('crecursos.access.edit')
            ->withUser($user)
            ->withUserRoles($user->roles->lists('id')->all())
            ->withRoles($this->roles->getAllRoles('sort', 'asc', true));
    }

	/**
     * @param User $user
     * @param UpdateUserRequest $request
     * @return mixed
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $this->users->update($user,
            $request->except('assignees_roles'),
            $request->only('assignees_roles')
        );
        return redirect()->route('crecursos.access.user.index')->withFlashSuccess(trans('alerts.crecursos.users.updated'));
    }

	/**
     * @param User $user
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function destroy(User $user, ManageUserRequest $request)
    {
        $this->users->destroy($user);
        return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.users.deleted'));
    }

	/**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function delete(User $deletedUser, ManageUserRequest $request)
    {   
        $this->users->delete($deletedUser);
        return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.users.deleted_permanently'));
    }

	/**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function restore(User $deletedUser, ManageUserRequest $request)
    {
        $this->users->restore($deletedUser);
        return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.users.restored'));
    }

	/**
     * @param User $user
     * @param $status
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function mark(User $user, $status, ManageUserRequest $request)
    {
        $this->users->mark($user, $status);
        return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.users.updated'));
    }

	/**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function deactivated(ManageUserRequest $request)
    {
        return view('crecursos.access.deactivated');
    }

	/**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function deleted(ManageUserRequest $request)
    {
        return view('crecursos.access.deleted');
    }

	/**
     * @param User $user
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function changePassword(User $user, ManageUserRequest $request)
    {
        return view('crecursos.access.change-password')
            ->withUser($user);
    }

	/**
     * @param User $user
     * @param UpdateUserPasswordRequest $request
     * @return mixed
     */
    public function updatePassword(User $user, UpdateUserPasswordRequest $request)
    {
        $this->users->updatePassword($user, $request->all());
        return redirect()->route('crecursos.access.user.index')->withFlashSuccess(trans('alerts.backend.users.updated_password'));
    }

	/**
     * @param User $user
     * @param FrontendUserRepositoryContract $user_repository
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function resendConfirmationEmail(User $user, FrontendUserRepositoryContract $user_repository, ManageUserRequest $request)
    {
		$user_repository->sendConfirmationEmail($user);
        return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.users.confirmation_email'));
    }

	/**
	 * @param User $user
	 * @param ManageUserRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function loginAs(User $user, ManageUserRequest $request) {
        return $this->users->loginAs($user);
    }

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function logoutAs() {
        return $this->users->logoutAs();
    }
}