<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Job\OurJobResource;
use App\JobOpportunity;
use Symfony\Component\HttpFoundation\Response;

class OurJobController extends Controller
{
    public function jobOpportunity(JobOpportunity $ourJob)
    {
        $ourJob = $ourJob->where('status' , '1')->orderBy('id', 'Asc')->get();
        return response(['data' => OurJobResource::collection($ourJob)] , Response::HTTP_CREATED);
    }
}
