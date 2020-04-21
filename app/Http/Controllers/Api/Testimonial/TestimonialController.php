<?php

namespace App\Http\Controllers\Api\Testimonial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Testimonial\TestimonialStoreRequest;
use App\Http\Resources\Testimonial\TestimonialResource;
use App\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TestimonialController extends Controller
{

    public function index(Testimonial $testimonial)
    {
        return response(['data' => TestimonialResource::collection($testimonial->all())], Response::HTTP_CREATED);
    }


    public function create()
    {
        //
    }


    public function store(TestimonialStoreRequest $request, Testimonial $testimonial)
    {
        if($request->has('testi_image')){
            $file = $request->file('testi_image');
            $extension = $file->getClientOriginalExtension();
            $testi_image ='testi_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/testimonial/'.$testi_image));
            $testi_image = $testi_image;
        }
        $testimonial->student = $request->student;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;
        $testimonial->testi_image = $testi_image;
        $testimonial->create = Auth::user()->id;
        $testimonial->save();
        return response(['data' => new TestimonialResource($testimonial)], Response::HTTP_CREATED);

    }


    public function show(Testimonial $testimonial)
    {
        return response(['data' => new TestimonialResource($testimonial)], Response::HTTP_CREATED);
    }





    public function updateById(Request $request, Testimonial $testimonial)
    {
       if(!$request->has('testi_image')){

       }
       else{
        @unlink(public_path('/storage/testimonial/'.$testimonial->testi_image));
        $file = $request->file('testi_image');
        $extension = $file->getClientOriginalExtension();
        $testi_image ='testi_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
        Image::make($file)->resize(600,600)->save(public_path('/storage/testimonial/'.$testi_image));
        $testi_image = $testi_image;
       }
       $testimonial->student = $request->student;
       $testimonial->designation = $request->designation;
       $testimonial->description = $request->description;
       $testimonial->testi_image = $testi_image;
       $testimonial->update();
       return response(['data' => new TestimonialResource($testimonial)], Response::HTTP_CREATED);

    }


    public function destroy(Testimonial $testimonial)
    {
        if($testimonial->testi_image){
            @unlink(public_path('/storage/testimonial/'.$testimonial->testi_image));
        }
        $testimonial->delete();
        return response(['data' => 'testimonial deleted']);
    }

    public function status(Request $request ,Testimonial $testimonial)
    {
        if($request->status === true){
            $testimonial->status = 1 ;
        }
        else{
            $testimonial->status = 0 ;
        }
        $testimonial->update();
        return response(['data' => new TestimonialResource($testimonial)], Response::HTTP_CREATED);
    }
}
