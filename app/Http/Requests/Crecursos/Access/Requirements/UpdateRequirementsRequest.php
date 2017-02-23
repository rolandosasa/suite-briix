<?php

namespace App\Http\Requests\Crecursos\Access\Requirements;

use App\Http\Requests\Request;

/**
 * Class UpdateRequirementsRequest
 * @package App\Http\Requests\Crecursos\Access\Requirements
 */
class UpdateRequirementsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //
    }
}
