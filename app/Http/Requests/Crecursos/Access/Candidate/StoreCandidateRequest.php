<?php

namespace App\Http\Requests\Crecursos\Access\Candidate;

use App\Http\Requests\Request;

/**
 * Class StoreCandidateRequest
 * @package App\Http\Requests\Crecursos\Access\Candidate
 */
class StoreCandidateRequest extends Request
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
         return [
            // 'client_id' => 'required',
            // 'executive_id' => 'required',
            // 'rate_plan_id' => 'required',
         ];
    }
}
