<?php

namespace App\Http\Requests\Crecursos\Access\Candidate;

use App\Http\Requests\Request;

/**
 * Class UpdateCandidateRequest
 * @package App\Http\Requests\Crecursos\Access\Candidate
 */
class UpdateCandidateRequest extends Request
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
