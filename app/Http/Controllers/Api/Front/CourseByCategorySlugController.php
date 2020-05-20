<?php

namespace App\Http\Controllers\Api\Front;

use App\CourseCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Category\CourseByCategorySlugResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseByCategorySlugController extends Controller
{
    public function courseBySlug(CourseCategory $category)
    {
        $category = $category->courses()->get();
        return response(['data' => CourseByCategorySlugResource::collection($category)], Response::HTTP_CREATED);
    }
}
