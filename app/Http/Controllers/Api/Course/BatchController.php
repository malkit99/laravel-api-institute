<?php

namespace App\Http\Controllers\Api\Course;

use App\Batch;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\BatchStoreRequest;
use App\Http\Resources\Course\BatchResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Batch $batch)
    {
        $batch = $batch->all();
        return response([ 'data' => BatchResource::collection($batch) ] , Response::HTTP_CREATED);
    }



    public function store(BatchStoreRequest $request)
    {
        $batch = new Batch();
        $batch->batch_size = $request->batch_size;
        $batch->save();
        return response([ 'data' => new BatchResource($batch) ] , Response::HTTP_CREATED);
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        $batch->batch_size = $request->batch_size;
        $batch->update();
        return response([ 'data' => new BatchResource($batch)] , Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return response([ 'data' => null ], Response::HTTP_NO_CONTENT);
    }
}
