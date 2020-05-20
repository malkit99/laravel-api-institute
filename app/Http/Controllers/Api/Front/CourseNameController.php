<?php

namespace App\Http\Controllers\Api\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Resources\Course\CourseAllNameResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseNameController extends Controller
{
    public function courseName(Course $courseName)
    {
        $courseName = $courseName->where('status' , '1')->orderBy('id' , 'Asc')->get();
        return response(['data' => CourseAllNameResource::collection($courseName)] , Response::HTTP_CREATED);
    }

    public function courseDiscountName(Course $courseDiscount)
    {
        $courseDiscount = $courseDiscount->where('discount_status' , '1')->orderBy('id' , 'Asc')->get();
        return response(['data' => CourseAllNameResource::collection($courseDiscount)] , Response::HTTP_CREATED);
    }
}
