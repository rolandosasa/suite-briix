<?php

namespace App\Http\Requests\Briix\Access\Packet;

use App\Http\Requests\Request;

/**
 * Class StorePacketRequest
 * @package App\Http\Requests\Briix\Access\Packet
 */
class StorePacketRequest extends Request
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
