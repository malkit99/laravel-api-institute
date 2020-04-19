<?php

namespace App\Http\Controllers\Api\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamStoreRequest;
use App\Http\Resources\Team\TeamResource;
use App\Team;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        return response(['data' =>  TeamResource::collection($team->all()) ], Response::HTTP_CREATED);
    }

    public function store(TeamStoreRequest $request, Team $team)
    {
        if($request->has('team_image'))
        {
            $file = $request->file('team_image');
            $extension = $file->getClientOriginalExtension();
            $team_image ='course_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/team/'.$team_image));
            $team_image = $team_image;

        }
            $team->name = $request->name;
            $team->post = $request->post;
            $team->facebook = $request->facebook;
            $team->insta = $request->insta;
            $team->twitter = $request->twitter;
            $team->linkedin = $request->linkedin;
            $team->description = $request->description;
            $team->create = Auth::user()->id;
            $team->team_image = $team_image;
            $team->save();

        return response(['data' => new TeamResource($team) ], Response::HTTP_CREATED);
    }


    public function show(Team $team)
    {
        return response(['data' => new TeamResource($team)],Response::HTTP_CREATED );
    }



    public function updateById(TeamStoreRequest $request, Team $team)
    {
        if(!$request->has('team_image')){


        }
        else{
            @unlink(public_path('/storage/team/'.$team->team_image));
            $file = $request->file('team_image');
            $extension = $file->getClientOriginalExtension();
            $team_image ='course_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/team/'.$team_image));
            $team_image = $team_image;
        }
        $team->name = $request->name;
        $team->post = $request->post;
        $team->facebook = $request->facebook;
        $team->insta = $request->insta;
        $team->twitter = $request->twitter;
        $team->linkedin = $request->linkedin;
        $team->description = $request->description;
        $team->create = Auth::user()->id;
        $team->team_image = $team_image;
        $team->update();
        return response(['data' => new TeamResource($team) ], Response::HTTP_CREATED);
    }

    public function destroy(Team $team)
    {
        @unlink(public_path('/storage/course/'.$team->team_image));
        $team->delete();
        return response(['data' => 'team member deleted']);
    }
}
