<?php

namespace App\Http\Controllers\Api\Course;

use App\CourseFee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CourseFeeStoreRequest;
use App\Http\Resources\Course\CourseFeeResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseFee $courseFee)
    {
        $courseFee = $courseFee->all();
        return response([ 'data' => CourseFeeResource::collection($courseFee) ] , Response::HTTP_CREATED);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseFeeStoreRequest $request)
    {
        $courseFee = new CourseFee();
        $courseFee->course_fee = $request->course_fee;
        $courseFee->save();
        return response([ 'data' => new CourseFeeResource($courseFee) ] , Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseFee  $courseFee
     * @return \Illuminate\Http\Response
     */
    public function show(CourseFee $courseFee)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseFee  $courseFee
     * @return \Illuminate\Http\Response
     */
    public function update(CourseFeeStoreRequest $request, CourseFee $courseFee)
    {
        $courseFee->course_fee = $request->course_fee;
        $courseFee->update();
        return response([ 'data' => new CourseFeeResource($courseFee)] , Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseFee  $courseFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseFee $courseFee)
    {
        $courseFee->delete();
        return response([ 'data' => null ], Response::HTTP_NO_CONTENT);
    }
}
