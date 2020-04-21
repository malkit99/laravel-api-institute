<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'title' => 'required|string|min:10|max:100',
            'start_date' => 'required|date|date_format:Y-m-d|before_or_equal:last_date|after:yesterday',
            'last_date' => 'required|date|date_format:Y-m-d|after_or_equal:start_date',
            'description' => 'required|string|min:10|max:300',
            'event_image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [

            'start_date.required' => 'The Start Date is Required Field',
            'last_date.required' => 'The Last Date is Required Field',
            'start_date.date_format' => 'The Start Date Format is (Date-Month-Year)',
            'last_date.date_format' => 'The Last Date Format is (Date-Month-Year)',
            'start_date.before_or_equal' => 'The Start Date Must be before or equal Last Date',
            'last_date.after_or_equal' => 'The Last Date Must be after or equal Start Date',
            'start_date.after' => 'The Start Date Must be After Yesterday Date',
        ];
    }
}
