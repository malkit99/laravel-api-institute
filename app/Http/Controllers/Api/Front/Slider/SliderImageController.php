<?php

namespace App\Http\Controllers\Api\Front\Slider;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Slider\SliderImageResource;
use App\Slider;
use Symfony\Component\HttpFoundation\Response;

class SliderImageController extends Controller
{
    public function index(Slider $sliderImage)
    {
        $sliderImage = $sliderImage->where('status', '1')->limit(5)->get();
        return response(['data' => SliderImageResource::collection($sliderImage)], Response::HTTP_CREATED);
    }
}
