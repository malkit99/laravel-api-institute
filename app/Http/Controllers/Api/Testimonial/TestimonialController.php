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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Testimonial $testimonial)
    {
        return response(['data' => TestimonialResource::collection($testimonial->all())], Response::HTTP_CREATED);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return response(['data' => new TestimonialResource($testimonial)], Response::HTTP_CREATED);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if($testimonial->testi_image){
            @unlink(public_path('/storage/testimonial/'.$testimonial->testi_image));
        }
        $testimonial->delete();
        return response(['data' => 'testimonial deleted']);
    }
}
