<?php

namespace App\Http\Controllers\Api\Front;

use App\CourseCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Category\OurCategoryResource;
use Symfony\Component\HttpFoundation\Response;

class OurCategoryController extends Controller
{
   public function index(CourseCategory $ourCategory)
   {
       $ourCategory = $ourCategory->orderBy('id','Asc')->get();
       return response(['data' => OurCategoryResource::collection($ourCategory)] , Response::HTTP_CREATED);
   }
}
