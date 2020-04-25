<?php

namespace App\Http\Requests\JobOpportunity;

use Illuminate\Foundation\Http\FormRequest;

class JobOpportunityStoreRequest extends FormRequest
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
            'company_name' => 'required|string|min:3|max:20|unique:job_opportunities,company_name',
            'job_image' => 'required|image',
        ];
    }
}
