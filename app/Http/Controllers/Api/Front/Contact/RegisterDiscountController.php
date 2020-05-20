<?php

namespace App\Http\Controllers\Api\Front\Contact;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\RegisterDiscountStoreRequest;
use App\RegisterDiscount;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterDiscountController extends Controller
{
    public function store(RegisterDiscountStoreRequest $request , RegisterDiscount $registerDiscount)
    {
        $registerDiscount->name = $request->name;
        $registerDiscount->mobile = $request->mobile;
        $registerDiscount->email = $request->email;
        $registerDiscount->course_id = $request->course_id;
        $registerDiscount->save();
        return response(['data' => 'Submit Successfully'], Response::HTTP_CREATED);
    }
}
