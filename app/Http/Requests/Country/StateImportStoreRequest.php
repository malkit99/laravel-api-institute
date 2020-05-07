<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class StateImportStoreRequest extends FormRequest
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
            'select_file' => 'required|mimes:xlsx,xls'
        ];
    }


    public function messages()
    {
        return [
            'select_file.required' => 'Excel File Field is Required',
            'select_file.mimes' => 'File Type Must be in Excel Format (xlsx , xls)',
        ];
    }
}
