<?php

namespace App\Http\Requests\Briix\Access\DiscountPlan;

use App\Http\Requests\Request;

/**
 * Class ManageDiscountPlanRequest
 * @package App\Http\Requests\Briix\Access\DiscountPlan
 */
class ManageDiscountPlanRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-discountplans');
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