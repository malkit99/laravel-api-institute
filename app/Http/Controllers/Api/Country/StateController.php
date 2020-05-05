<?php

namespace App\Http\Controllers\Api\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StateStoreRequest;
use App\Http\Resources\Country\GetStateByIdResource;
use App\Http\Resources\Country\StateResource;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class StateController extends Controller
{

    public function index(State $state)
    {
        $state = $state->all();
        return response(['data' => StateResource::collection($state)], Response::HTTP_CREATED);
    }

    public function store(StateStoreRequest $request , State $state)
    {
        $state->state_name = $request->state_name;
        $state->country_id = $request->country_id;
        $state->save();
        return response(['data' => new StateResource($state)], Response::HTTP_CREATED);
    }


    public function update(Request $request, State $state)
    {
        $state->state_name = $request->state_name;
        $state->country_id = $request->country_id;
        $state->update();
        return response(['data' => new StateResource($state)], Response::HTTP_CREATED);
    }

    public function show(Request $request, State $state)
    {
        return response(['data' => new GetStateByIdResource($state)], Response::HTTP_CREATED);
    }

    public function destroy(State $state)
    {
        if(count($state->cities) > 0){
            return response(['message' => 'State Have Many Cities You Do Not Delete It'], Response::HTTP_NOT_MODIFIED );
        }
        $state->delete();
        return response(['message' => 'State Deleted Successfully'] , Response::HTTP_ACCEPTED);
    }

    public function getStateById($id){
        $state = DB::table('states')->where('country_id' , $id)->get();
        return response(['data' => $state] , Response::HTTP_CREATED);
    }
}
