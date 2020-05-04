<?php

namespace App\Http\Controllers\Api\Discount;

use App\Discount;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\Discount\DiscountStoreRequest;
use App\Http\Resources\Discount\DiscountResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiscountController extends Controller
{

    public function index(Discount $discount)
    {
        $discount = $discount->all();
        return response(['data' => DiscountResource::collection($discount)], Response::HTTP_CREATED);
    }


    public function store(DiscountStoreRequest $request , Discount $discount)
    {
        if($request->has('discount_image')){
            $file = $request->file('discount_image');
            $extension = $file->getClientOriginalExtension();
            $discount_image ='discount_image'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/discount/'.$discount_image));
            $discount_image = $discount_image;
        }
        $discount->discount_title = $request->discount_title;
        $discount->discount = $request->discount;
        $discount->description = $request->description;
        $discount->last_date = $request->last_date;
        $discount->discount_image = $discount_image;
        $discount->save();
        return response(['data' => new DiscountResource($discount)], Response::HTTP_CREATED);

    }

    public function show(Discount $discount)
    {
        return response(['data' => new DiscountResource($discount)], Response::HTTP_CREATED);
    }


    public function update(Request $request, Discount $discount)
    {
        //
    }


    public function destroy(Discount $discount)
    {
        if($discount->discount_image){
            @unlink(public_path('/storage/discount/'.$discount->discount_image));
        }
        $discount->delete();
        return response(['data' => 'discount Detail deleted']);
    }
}
