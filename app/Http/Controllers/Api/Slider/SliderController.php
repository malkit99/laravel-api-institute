<?php

namespace App\Http\Controllers\Api\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderStoreRequest;
use App\Http\Resources\Slider\SliderResource;
use App\Slider;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SliderController extends Controller
{

    public function index(Slider $slider)
    {
        $slider =$slider->all();
        return response(['data' => SliderResource::collection($slider)], Response::HTTP_CREATED);
    }



    public function store(SliderStoreRequest $request , Slider $slider)
    {
        if($request->has('slider_image')){
            $file = $request->file('slider_image');
            $extension = $file->getClientOriginalExtension();
            $slider_image ='slider_image'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(1400,600)->save(public_path('/storage/slider/'.$slider_image));
            $slider_image = $slider_image;
        }
        $slider->title = $request->title;
        $slider->slider_image = $slider_image;
        $slider->save();
        return response(['data' => new SliderResource($slider)], Response::HTTP_CREATED);

    }


    public function show(Slider $slider)
    {
        return response(['data' => new SliderResource($slider)], Response::HTTP_CREATED);
    }


    public function updateById(Request $request, Slider $slider)
    {
        if(!$request->file('slider_image')){

        }
        else {
            @unlink(public_path('/storage/slider/'.$slider->slider_image));
            $file = $request->file('slider_image');
            $extension = $file->getClientOriginalExtension();
            $slider_image ='slider_image'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(1400,600)->save(public_path('/storage/slider/'.$slider_image));
            $slider_image = $slider_image;
        }
        $slider->title = $request->title;
        $slider->slider_image = $slider_image;
        $slider->update();
        return response(['data' => new SliderResource($slider)], Response::HTTP_CREATED);
    }

    public function destroy(Slider $slider)
    {
        if($slider->slider_image){
            @unlink(public_path('/storage/slider/'.$slider->slider_image));
        }
        $slider->delete();
        return response(['data' => 'slider Detail deleted']);
    }

    public function status(Request $request ,Slider $slider)
    {
        if($request->status === true){
            $slider->status = 1 ;
        }
        else{
            $slider->status = 0 ;
        }
        $slider->update();
        return response(['data' => new SliderResource($slider)], Response::HTTP_CREATED);
    }
}
