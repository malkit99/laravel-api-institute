<?php

namespace App\Http\Controllers\Api\Front;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Event\OurEventResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OurEventController extends Controller
{
    public function index(Event $ourEvent)
    {
        $ourEvent = $ourEvent->where('status', '1')->limit(3)->get();
        return response(['data' => OurEventResource::collection($ourEvent)], Response::HTTP_CREATED);
    }
}
