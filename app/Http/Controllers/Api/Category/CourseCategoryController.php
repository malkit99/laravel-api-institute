<?php

namespace App\Http\Controllers\Api\Category;

use App\CourseCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Resources\Category\CategoryResource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CourseCategoryController extends Controller
{

    public function index(CourseCategory $category)
    {
        return CategoryResource::collection($category->all());
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = new CourseCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name , "-");
        $category->description = $request->description;
        $category->user_id = Auth::user()->id;
        $category->save();
        return new CategoryResource($category);
    }


    public function categoryById(CourseCategory $courseCategory)
    {

        return new CategoryResource($courseCategory);
    }

    public function update(CategoryStoreRequest $request , CourseCategory $category)
    {
        $category->name = $request->name;
        $category->slug = Str::slug($request->name , "-");
        $category->description = $request->description;
        $category->update();
        return new CategoryResource($category);
    }

    public function destroy(CourseCategory $category)
    {
        if(count($category->courses) > 0){
            return response(['message' => 'Category have Many Courses you donot delete Category']);
        }
        $category->delete();
        return response(['message' => 'Category Deleted Successfully'], Response::HTTP_CREATED);
    }
}
