<?php

namespace App\Http\Controllers\Api\Course;

use App\CourseCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CourseCodeStoreRequest;
use App\Http\Resources\Course\CourseCodeResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseCode $courseCode)
    {
        $courseCode = $courseCode->all();
        return response([ 'data' => CourseCodeResource::collection($courseCode) ] , Response::HTTP_CREATED);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseCodeStoreRequest $request)
    {
        $code = new CourseCode();
        $code->course_code = $request->course_code;
        $code->save();
        return ;
        return response([ 'data' => new CourseCodeResource($code)] , Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseCode  $courseCode
     * @return \Illuminate\Http\Response
     */
    public function show(CourseCode $courseCode)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseCode  $courseCode
     * @return \Illuminate\Http\Response
     */
    public function update(CourseCodeStoreRequest $request, CourseCode $courseCode)
    {

        $courseCode->course_code = $request->course_code;
        $courseCode->update();
        return response([ 'data' => new CourseCodeResource($courseCode)] , Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseCode  $courseCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseCode $courseCode)
    {
        $courseCode->delete();
        return response([ 'data' => null ], Response::HTTP_NO_CONTENT);
    }
}
