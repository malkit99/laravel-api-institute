<?php

namespace App\Http\Controllers\Api\Country;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryStoreRequest;
use App\Http\Resources\Country\CountryResource;
use App\Http\Resources\Country\GetStateByIdResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{

    public function index(Country $country)
    {
        $country = $country->all();
        return response(['data' => CountryResource::collection($country)], Response::HTTP_CREATED);
    }


    public function store(CountryStoreRequest $request , Country $country)
    {
        $country->country_name = $request->country_name;
        $country->save();
        return response(['data' => new CountryResource($country)], Response::HTTP_CREATED);
    }

    public function update(Request $request, Country $country)
    {
        if($country->country_name !== $request->country_name){
            $country->country_name = $request->country_name;
            $country->update();
        }
        return response(['data' => new CountryResource($country)], Response::HTTP_CREATED);
    }

    public function destroy(Country $country)
    {
        if(count($country->states) > 0){
            return response(['message' => 'Country Have Many State You Do Not Delete It'] , Response::HTTP_NOT_MODIFIED);
        }
        $country->delete();
        return response(['message' => 'Country Deleted Successfully'], Response::HTTP_ACCEPTED);
    }




}
