<?php

namespace App\Http\Requests\Briix\Access\RatePlan;

use App\Http\Requests\Request;

/**
 * Class ManageRatePlanRequest
 * @package App\Http\Requests\Briix\Access\RatePlan
 */
class ManageRatePlanRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-rateplans');
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