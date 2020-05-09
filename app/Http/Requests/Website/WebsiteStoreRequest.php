<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteStoreRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:30',
            'email' => 'required|email|unique:websites,email',
            'mobile' => 'required',
            'mobile_2' => 'required',
            'facebook' => 'required|url',
            'insta' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'address_line_1' => 'required|string|min:10|max:50',
            'address_line_2' => 'nullable|string|min:5|max:50',
            'state' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string',
            'city' => 'nullable|string|min:3|max:20',
            'pin_code' => 'nullable|string|min:3|max:20',
            'logo' => 'required|image',

        ];
    }
}
