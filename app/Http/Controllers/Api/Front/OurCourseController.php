<?php

namespace App\Http\Controllers\Api\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Course\OurCourseResource;
use Symfony\Component\HttpFoundation\Response;

class OurCourseController extends Controller
{
    public function index(Course $ourCourse)
    {
        $ourCourse = $ourCourse->where('status' , '1')->where('popular_course', '1')->orderBy('id', 'Asc')->get();
        return response(['data' => OurCourseResource::collection($ourCourse)], Response::HTTP_CREATED);
    }
}
