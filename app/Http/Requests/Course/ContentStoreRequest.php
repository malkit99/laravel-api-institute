<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class ContentStoreRequest extends FormRequest
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
            'subject_name' => 'required|string|max:50|min:3|unique:subjects,subject_name',
            'contents' => 'required|array|min:1',
            'contents.*.topic_name' => 'required|min:5|max:50|string',
            'contents.*.topic_description' => 'required|min:30|string',

        ];
    }
}
