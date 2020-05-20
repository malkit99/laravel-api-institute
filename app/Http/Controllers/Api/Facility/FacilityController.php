<?php

namespace App\Http\Controllers\Api\Facility;

use App\Facility;
use App\Http\Controllers\Controller;
use App\Http\Requests\Facility\FacilityStoreRequest;
use App\Http\Resources\Facility\FacilityResource;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class FacilityController extends Controller
{

    public function index(Facility $facility)
    {
        $facility = $facility->all();
        return response(['data' => FacilityResource::collection($facility)], Response::HTTP_CREATED);
    }


    public function store(FacilityStoreRequest $request , Facility $facility)
    {
        if($request->has('facility_image'))
        {
            $file = $request->file('facility_image');
            $extension = $file->getClientOriginalExtension();
            $facility_image ='facility_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/facility/'.$facility_image));
            $facility_image = $facility_image;
        }
        $facility->facility_name = $request->facility_name;
        $facility->title = $request->title;
        $facility->description = $request->description;
        $facility->facility_image = $facility_image;
        $facility->save();
        return response(['data' => new FacilityResource($facility)], Response::HTTP_CREATED);
    }


    public function show(Facility $facility)
    {
        return response(['data' => new FacilityResource($facility)], Response::HTTP_CREATED);
    }


    public function updateById(FacilityStoreRequest $request, Facility $facility)
    {
        if(!$request->has('facility_image')){

        }
        else{
            @unlink(public_path('/storage/facility/'.$facility->facility_image));
            $file = $request->file('facility_image');
            $extension = $file->getClientOriginalExtension();
            $facility_image ='facility_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/facility/'.$facility_image));
            $facility_image = $facility_image;
        }

        if($request->facility_name !== $facility->facility_name){
            $facility->facility_name = $request->facility_name;
        }
        $facility->title = $request->title;
        $facility->description = $request->description;
        $facility->facility_image = $facility_image;
        $facility->update();
        return response(['data' => new FacilityResource($facility)], Response::HTTP_CREATED);
    }


    public function destroy(Facility $facility)
    {
        @unlink(public_path('/storage/facility/'.$facility->facility_image));
        $facility->delete();
        return response(['data' => 'Facility Deleted Successfully'], Response::HTTP_ACCEPTED);
    }

    public function status(Request $request , Facility $facility)
    {
        if($request->status === true){
            $facility->status = 1 ;
        }
        else{
            $facility->status = 0 ;
        }
        $facility->update();
        return response(['data' => new FacilityResource($facility)], Response::HTTP_CREATED);
    }
}
