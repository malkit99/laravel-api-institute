<?php

namespace App\Http\Controllers\Api\Front;

use App\Discount;
use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Discount\OurDiscountResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OurDiscountController extends Controller
{
    public function index(Discount $ourDiscount){
        $ourDiscount = $ourDiscount->where('status' , '1')->get();
        return response(['data' => OurDiscountResource::collection($ourDiscount)], Response::HTTP_CREATED);
    }
}
