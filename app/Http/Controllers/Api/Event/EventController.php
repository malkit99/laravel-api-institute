<?php

namespace App\Http\Controllers\Api\Event;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\EventStoreRequest;
use App\Http\Resources\Event\EventResource;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{

    public function index(Event $event)
    {
        return response(['data' =>  EventResource::collection($event->all())], Response::HTTP_CREATED);
    }

    public function store(EventStoreRequest $request , Event $event)
    {
        if($request->has('event_image')){
            $file = $request->file('event_image');
            $extension = $file->getClientOriginalExtension();
            $event_image ='event_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/event/'.$event_image));
            $event_image = $event_image;
        }
        $event->title = $request->title;
        $event->description = $request->description;
        $event->loction = $request->loction;
        $event->create = Auth::user()->id;
        $event->start_date = $request->start_date;
        $event->last_date = $request->last_date;
        $event->event_image = $event_image;
        $event->save();

        return response(['data' => new EventResource($event)], Response::HTTP_CREATED);
    }


    public function show(Event $event)
    {
        return response(['data' => new EventResource($event)], Response::HTTP_CREATED);
    }




    public function update(Request $request, Event $event)
    {
        //
    }

    public function destroy(Event $event)
    {
        if($event->event_image){
            @unlink(public_path('/storage/event/'.$event->event_image));
        }
        $event->delete();
        return response(['data' => 'testimonial deleted']);
    }
}
