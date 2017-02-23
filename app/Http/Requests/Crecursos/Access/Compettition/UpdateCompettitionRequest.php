<?php

namespace App\Http\Requests\Crecursos\Access\Compettition;

use App\Http\Requests\Request;

/**
 * Class UpdateCompetitionRequest
 * @package App\Http\Requests\Crecursos\Access\Compettition
 */
class UpdateCompettitionRequest extends Request
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
