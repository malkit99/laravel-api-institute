<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Testimonial\OurTestimonialResource;
use App\Testimonial;
use Symfony\Component\HttpFoundation\Response;

class OurTestimonialController extends Controller
{
    public function index(Testimonial $ourTestimonial)
    {
        $ourTestimonial = $ourTestimonial->where('status' , '1')->orderBy('id', 'desc')->get();
        return response(['data' => OurTestimonialResource::collection($ourTestimonial)], Response::HTTP_CREATED);
    }
}
