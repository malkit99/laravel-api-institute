<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
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
            "course_name"           => "required",
            "course_code_id"        => "required",
            "title"                 => "required",
            "course_category_id"    => "required",
            "batch_id"              => "required",
            "duration_id"           => "required",
            "course_fee_id"         => "required",
            "duration_id"           => "required",
            "course_image"          => "required|image",
            "skill_level"           => "required",
            "subject*"              => "required",
        ];
    }



}
