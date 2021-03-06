<?php

namespace App\Http\Requests\Briix\Access\Enterprise;

use App\Http\Requests\Request;

/**
 * Class ManageEnterpriseRequest
 * @package App\Http\Requests\Briix\Access\Enterprise
 */
class ManageEnterpriseRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-enterprises');
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