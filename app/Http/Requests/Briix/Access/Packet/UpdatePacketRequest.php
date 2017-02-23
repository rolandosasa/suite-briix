<?php

namespace App\Http\Requests\Briix\Access\Packet;

use App\Http\Requests\Request;

/**
 * Class UpdatePlanRequest
 * @package App\Http\Requests\Briix\Access\Plan
 */
class UpdatePacketRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-packets');
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
