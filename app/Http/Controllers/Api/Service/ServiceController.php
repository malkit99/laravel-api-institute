<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceStoreRequest;
use App\Http\Resources\Service\ServiceResource;
use App\Service;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{

    public function index(Service $service)
    {
        $service = $service->all();
        return response(['data' => ServiceResource::collection($service)] , Response::HTTP_CREATED);
    }

    public function store(ServiceStoreRequest $request , Service $service)
    {
        if($request->has('service_image'))
        {
            $file = $request->file('service_image');
            $extension = $file->getClientOriginalExtension();
            $service_image ='service_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/service/'.$service_image));
            $service_image = $service_image;
        }
        $service->service_name = $request->service_name;
        $service->description = $request->description;
        $service->create = Auth::user()->id;
        $service->service_image = $service_image;
        $service->save();

        return response(['data' => new ServiceResource($service)] , Response::HTTP_CREATED);


    }

    public function show(Service $service)
    {
        return response(['data' => new ServiceResource($service)] , Response::HTTP_CREATED);
    }


    public function updateById(Request $request, Service $service)
    {
        if(!$request->has('service_image')){

        }
        else{
            @unlink(public_path('/storage/service/'.$service->service_image));
            $file = $request->file('service_image');
            $extension = $file->getClientOriginalExtension();
            $service_image ='service_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/service/'.$service_image));
            $service_image = $service_image;
        }
        $service->service_name = $request->service_name;
        $service->description = $request->description;
        $service->service_image = $service_image;
        $service->update();

        return response(['data' => new ServiceResource($service)] , Response::HTTP_CREATED);
    }

    public function destroy(Service $service)
    {
        @unlink(public_path('/storage/service/'.$service->service_image));
        $service->delete();
        return response(['data' => 'service deleted'], Response::HTTP_ACCEPTED);
    }

    public function status(Request $request ,Service $service)
    {
        if($request->status === true){
            $service->status = 1 ;
        }
        else{
            $service->status = 0 ;
        }
        $service->update();
        return response(['data' => new ServiceResource($service)] , Response::HTTP_CREATED);
    }
}
