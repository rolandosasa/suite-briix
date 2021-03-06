<?php

namespace App\Http\Requests\Cmovil\Access\Role;

use App\Http\Requests\Request;

/**
 * Class ManageRoleRequest
 * @package App\Http\Requests\Cmovil\Access\Role
 */
class ManageRoleRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-roles');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//
		];
	}
}