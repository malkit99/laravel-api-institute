<?php

namespace App\Http\Requests\Discount;

use Illuminate\Foundation\Http\FormRequest;

class DiscountStoreRequest extends FormRequest
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
            'discount_title' => 'required|min:5|max:100|string',
            'discount' => 'required|digits_between:1,2',
            'course_id' => 'required',
            'description' => 'required|min:10|max:200|string',
            'last_date' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'discount_image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'last_date.required' => 'The Last Date is Required Field',
            'last_date.date_format' => 'The Last Date Format is (Year-Month-Date)',
            'last_date.after_or_equal' => 'The Last Date Must be after or equal Today',
        ];
    }
}
