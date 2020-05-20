<?php

namespace App\Http\Controllers\Api\Front;

use App\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Authorization\OurAuthorizationResource;
use Symfony\Component\HttpFoundation\Response;

class OurAuthorizationController extends Controller
{
    public function index(Authorization $ourAuthorization)
    {
        $ourAuthorization = $ourAuthorization->where('status', '1')->get();
        return response(['data' => OurAuthorizationResource::collection($ourAuthorization)], Response::HTTP_CREATED);
    }
}
