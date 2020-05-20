<?php

namespace App\Http\Controllers\Api\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Course\CourseByCourseSlugResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseByCourseSlugController extends Controller
{
    public function courseByCourseSlug(Course $course)
    {
        return response(['data' => new CourseByCourseSlugResource($course)] , Response::HTTP_CREATED);
    }
}
