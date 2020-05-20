<?php

namespace App\Http\Controllers\Api\Front;

use App\Facility;
use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Facility\OurFacilityResource;
use Symfony\Component\HttpFoundation\Response;

class OurFacilityController extends Controller
{
    public function index(Facility $ourFacility)
    {
        $ourFacility = $ourFacility->where('status' , '1')->orderBy('id' , 'Asc')->limit(4)->get();
        return response(['data' => OurFacilityResource::collection($ourFacility)] , Response::HTTP_CREATED);
    }
}
