<?php

namespace App\Http\Controllers\Api\Course;

use App\Duration;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\DurationStoreRequest;
use App\Http\Resources\Course\DurationResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Duration $duration)
    {
        $duration = $duration->all();

        return response([ 'data' => DurationResource::collection($duration) ] , Response::HTTP_CREATED);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DurationStoreRequest $request)
    {
        $duration = new Duration();
        $duration->duration = $request->duration;
        $duration->save();
        return response([ 'data' => new DurationResource($duration)] , Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function show(Duration $duration)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function update(DurationStoreRequest $request, Duration $duration)
    {
        $duration->duration = $request->duration;
        $duration->update();
        return response([ 'data' => new DurationResource($duration)] , Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duration $duration)
    {
        $duration->delete();
        return response([ 'data' => null ], Response::HTTP_NO_CONTENT);
    }
}
