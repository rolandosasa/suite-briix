<?php

namespace App\Http\Requests\Cmovil\Access\Line;

use App\Http\Requests\Request;

/**
 * Class StoreEnterpriseRequest
 * @package App\Http\Requests\Cmovil\Access\Enterprise
 */
class StoreLineRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-lines');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
