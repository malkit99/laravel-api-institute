<?php

namespace App\Http\Controllers\Api\Front\Service;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Service\OurServiceResource;
use App\Service;
use Symfony\Component\HttpFoundation\Response;

class OurServiceController extends Controller
{
    public function index(Service $ourService)
    {
        $ourService = $ourService->where('status', '1')->limit(3)->get();
        return response(['data' => OurServiceResource::collection($ourService)], Response::HTTP_CREATED);
    }
}
