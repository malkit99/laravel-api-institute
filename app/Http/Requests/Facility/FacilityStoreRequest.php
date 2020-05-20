<?php

namespace App\Http\Requests\Facility;

use Illuminate\Foundation\Http\FormRequest;

class FacilityStoreRequest extends FormRequest
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
            'facility_name' => 'required|string|min:5|max:30|unique:facilities,facility_name',
            'title' => 'required|string|min:5|max:50',
            'description' => 'required|string|min:10|max:200',
            'facility_image' => 'required|image',
        ];
    }
}
