<?php

namespace App\Http\Requests\Authorization;

use Illuminate\Foundation\Http\FormRequest;

class AuthorizationStoreRequest extends FormRequest
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
            'authorization_name' => 'required|string|min:3|max:20|unique:authorizations,authorization_name',
            'auth_type' => 'required|string|min:3|max:10',
            'auth_image' => 'required|image',
        ];
    }
}
