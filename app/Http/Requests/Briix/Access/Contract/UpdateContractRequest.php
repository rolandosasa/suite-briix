<?php

namespace App\Http\Requests\Briix\Access\Contract;

use App\Http\Requests\Request;

/**
 * Class UpdateContractRequest
 * @package App\Http\Requests\Briix\Access\Contract
 */
class UpdateContractRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-contracts');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rate_plan_id' => 'required',
        ];
    }
}
