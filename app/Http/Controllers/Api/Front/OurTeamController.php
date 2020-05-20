<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Team\OurTeamResource;
use App\Team;
use Symfony\Component\HttpFoundation\Response;

class OurTeamController extends Controller
{
    public function index(Team $ourTeam)
    {
        $ourTeam = $ourTeam->where('status', '1')->get();
        return response(['data' => OurTeamResource::collection($ourTeam)], Response::HTTP_CREATED);
    }
}
