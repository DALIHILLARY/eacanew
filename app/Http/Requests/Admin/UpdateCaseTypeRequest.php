<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\CaseType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCaseTypeRequest extends FormRequest
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
        $rules = CaseType::$rules;
        
        return $rules;
    }
}
