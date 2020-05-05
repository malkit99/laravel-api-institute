<?php

namespace App\Http\Controllers\Api\Country;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CityStoreRequest;
use App\Http\Resources\Country\CityByIdResource;
use App\Http\Resources\Country\CityResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{

    public function index(City $city)
    {
        $city = $city->all();
        return response(['data' => CityResource::collection($city)], Response::HTTP_CREATED);
    }


    public function store(CityStoreRequest $request , City $city)
    {
        $city->city_name = $request->city_name;
        $city->state_id = $request->state_id;
        $city->save();
        return response(['data' => new CityResource($city)], Response::HTTP_CREATED);
    }


    public function show(City $city)
    {
        return response(['data' => new CityByIdResource($city)], Response::HTTP_CREATED);
    }

    public function update(Request $request, City $city)
    {
        $city->city_name = $request->city_name;
        $city->state_id = $request->state_id;
        $city->update();
        return response(['data' => new CityResource($city)], Response::HTTP_CREATED);
    }

    public function getCityById($id){
        $city = DB::table('cities')->where('state_id' , $id)->get();
        return response(['data' => $city] , Response::HTTP_CREATED);
    }
}
