<?php

namespace App\Http\Controllers\Api\Course;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CourseStoreRequest;
use App\Http\Resources\Course\CourseByIdResource;
use App\Http\Resources\Course\CourseBySlugResource;
use App\Http\Resources\Course\CourseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{

    public function index(Course $course)
    {
        $course = $course->all();
        return response(['data' => CourseResource::collection($course)], Response::HTTP_CREATED);
    }



    public function store(CourseStoreRequest $request)
    {
        if($request->has('course_image'))
        {
            $file = $request->file('course_image');
            $extension = $file->getClientOriginalExtension();
            $course_image ='course_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/course/'.$course_image));
            $course_image = $course_image;

        }
            $course = new Course();
            $course->course_name  = $request->course_name ;
            $course->course_code_id  = $request->course_code_id ;
            $course->title  = $request->title ;
            $course->slug  = Str::slug($request->title , "-");
            $course->course_category_id  = $request->course_category_id;
            $course->batch_id  = $request->batch_id;
            $course->duration_id  = $request->duration_id ;
            $course->course_fee_id   = $request->course_fee_id ;
            $course->duration_id  = $request->duration_id;
            $course->course_image  = $course_image;
            $course->skill_level  = $request->skill_level;
            $course->save();
            $subject = $request->input('subject') ? $request->input('subject') : [];
            $subject= array_map('intval', explode(',', $request['subject']));
            $course->subjects()->attach($subject);
            return response(['data' => new CourseResource($course)], Response::HTTP_CREATED);

        // return response(['data' => $request->all()]);
    }



    public function showBySlug(Course $course)
    {
        return response(['data' => new CourseBySlugResource($course)], Response::HTTP_CREATED);
    }

    public function showById(Course $course)
    {
        return response(['data' => new CourseByIdResource($course)], Response::HTTP_CREATED);
    }


    public function updateById(Request $request, Course $course)
    {
        if(!$request->has('course_image'))
        {

        }
        else{
            @unlink(public_path('/storage/course/'.$course->course_image));
            $file = $request->file('course_image');
            $extension = $file->getClientOriginalExtension();
            $course_image ='course_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/course/'.$course_image));
            $course_image = $course_image;
        }
        $course->course_name  = $request->course_name ;
        $course->title  = $request->title ;
        $course->slug  = Str::slug($request->title , "-");
        $course->course_category_id  = $request->category;
        $course->batch_id  = $request->batch;
        $course->course_code_id  = $request->code;
        $course->duration_id  = $request->duration ;
        $course->course_fee_id   = $request->fee;
        $course->course_image  = $course_image;
        $course->skill_level  = $request->skill_level;
        $course->update();

        if($request->input('subject'))
        {
            $subject = $request->input('subject') ? $request->input('subject') : [];
            $subject= array_map('intval', explode(',', $request['subject']));
            $course->subjects()->sync($subject);
        }
        return response(['data' => new CourseResource($course)], Response::HTTP_CREATED);

    }

    public function destroy(Course $course)
    {
        @unlink(public_path('/storage/course/'.$course->course_image));
        $course->delete();
        $course->subjects()->detach($course->subject_id);
        return response(['data' => 'course Deleted']);
    }
}
