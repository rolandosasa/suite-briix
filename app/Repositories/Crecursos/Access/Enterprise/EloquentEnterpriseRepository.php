<?php

namespace App\Repositories\Crecursos\Access\Enterprise;

use App\Models\Crecursos\Access\Enterprise\Enterprise;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

use App\Events\Crecursos\Access\Enterprise\EnterpriseCreated;
use App\Events\Crecursos\Access\Enterprise\EnterpriseDeleted;
use App\Events\Crecursos\Access\Enterprise\EnterpriseUpdated;

/**
* Class EloquentEnterpriseRepository
* @package app\Repositories\Enterprise
*/
class EloquentEnterpriseRepository implements EnterpriseRepositoryContract
{
	
	/**
	 * @return mixed
	 */
	public function getCount() {
			return Enterprise::count();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */

	public function getForDataTable($trashed = false)
	{
		/**
		 * Note: You must return deleted_at or the User getActionButtonsAttribute won't
		 * be able to differentiate what buttons to show for each row.
		 */
		if ($trashed == "true") {
			return Enterprise::onlyTrashed()
				->select(['id', 'rfc', 'name_enterprise', 'email', 'phone', 'address', 'created_at', 'updated_at', 'deleted_at'])
				->get();
		}

		return Enterprise::select(['id', 'rfc', 'name_enterprise', 'email', 'phone', 'address', 'created_at', 'updated_at', 'deleted_at'])
			->get();
	}


	/**
	 * @param  string  $order_by
	 * @param  string  $sort
	 * @param  bool    $withPermissions
	 * @return mixed
	 */
	public function getAllEnterprises($order_by = 'sort', $sort = 'asc', $withDepartments = false)
	{
		return Enterprise::orderBy($order_by, $sort)->get();
	}

	/**
	 * @param  $input
	 * @throws GeneralException
	 * @return bool
	 */
	public function create($input, $departments)
	{
		$enterprise = $this->createEnterpriseStub($input);
			DB::transaction(function() use ($enterprise, $departments) {
				if ($enterprise->save()) {
					$enterprise->departments()->attach($departments['assignees_departments']);
					event(new EnterpriseCreated($enterprise));
					return true;
				}

				throw new GeneralException(trans('exceptions.crecursos.access.enterprise.create_error'));
			});
	}

	/**
	 * @param  Enterprise $Enterprise
	 * @param  $input
	 * @throws GeneralException
	 * @return bool
	 */
	public function update(Enterprise $enterprise, $input, $departments)
	{

		DB::transaction(function() use ($enterprise, $input, $departments) {
			if ($enterprise->update($input)) {
				$enterprise->save();
				$enterprise->departments()->sync($departments['assignees_departments'] ?: []);

				event(new EnterpriseUpdated($enterprise));
				return true;
			}

			throw new GeneralException(trans('exceptions.crecursos.access.enterprise.update_error'));
		});
	}

	/**
	 * @param  Enterprise $Enterprise
	 * @throws GeneralException
	 * @return bool
	 */
	public function destroy(Enterprise $enterprise)
	{
		if ($enterprise->delete()) {
			event(new EnterpriseDeleted($enterprise));
			return true;
		}

		throw new GeneralException(trans('exceptions.crecursos.access.enterprise.delete_error'));	
	}

	/**
	 * @param  $input
	 * @return mixed
	 */
	private function createEnterpriseStub($input)
	{
			$enterprise             = new Enterprise;
			$enterprise->rfc        			= $input['rfc'];
			$enterprise->name_enterprise	= $input['name_enterprise'];
			$enterprise->email      			= $input['email'];
			$enterprise->phone      			= $input['phone'];
			$enterprise->address      		= $input['address'];
			$enterprise->save();
			return $enterprise;
	}
}