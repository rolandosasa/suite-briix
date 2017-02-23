<?php

namespace App\Http\Requests\Briix\Access\User;

use App\Http\Requests\Request;

/**
 * Class ManageUserRequest
 * @package App\Http\Requests\Briix\Access\User
 */
class ManageUserRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-users');
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
