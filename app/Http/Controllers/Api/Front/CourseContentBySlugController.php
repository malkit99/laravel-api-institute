<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Course\CourseContentBySlugResource;
use App\Subject;
use Symfony\Component\HttpFoundation\Response;

class CourseContentBySlugController extends Controller
{
    public function courseContentBySlug(Subject $subject)
    {
        $subject = $subject->contents()->get();
        return response(['data' => CourseContentBySlugResource::collection($subject)], Response::HTTP_CREATED);
    }
}
