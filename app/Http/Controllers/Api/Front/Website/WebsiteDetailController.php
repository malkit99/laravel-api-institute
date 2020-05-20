<?php

namespace App\Http\Controllers\Api\Front\Website;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Website\WebsiteDetailResource;
use App\Website;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsiteDetailController extends Controller
{

    public function index(Website $websiteDetail)
    {
        $websiteDetail = $websiteDetail->where('status', '1')->limit(1)->get();
        return response(['data' => WebsiteDetailResource::collection($websiteDetail)], Response::HTTP_CREATED);
    }


}
