<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDiscountStoreRequest extends FormRequest
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
            'name' => 'required|min:3|max:30|string',
            'mobile'=>'required|unique:register_discounts,mobile',
            'email' => 'required|email',
            'course_id'=> 'required',
        ];
    }

    public function messages(){
        return [
           'mobile.unique' => 'The Mobile Number Allready Registered For Discounted Course'
        ];
    }
}
