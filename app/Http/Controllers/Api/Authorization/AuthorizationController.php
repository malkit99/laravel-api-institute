<?php

namespace App\Http\Controllers\Api\Authorization;

use App\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authorization\AuthorizationStoreRequest;
use App\Http\Resources\Authorization\AuthorizationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class AuthorizationController extends Controller
{

    public function index(Authorization $authorization)
    {
        $authorization =$authorization->all();
        return response(['data' => AuthorizationResource::collection($authorization)], Response::HTTP_CREATED);
    }



    public function store(AuthorizationStoreRequest $request , Authorization $authorization)
    {
        if($request->has('auth_image'))
        {
            $file = $request->file('auth_image');
            $extension = $file->getClientOriginalExtension();
            $auth_image ='auth_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/authorization/'.$auth_image));
            $auth_image = $auth_image;
        }

        $authorization->authorization_name = $request->authorization_name;
        $authorization->auth_type = $request->auth_type;
        $authorization->create = Auth::user()->id;
        $authorization->auth_image = $auth_image;
        $authorization->save();
        return response(['data' => new AuthorizationResource($authorization)], Response::HTTP_CREATED);
    }


    public function show(Authorization $authorization)
    {
        return response(['data' => new AuthorizationResource($authorization)], Response::HTTP_CREATED);
    }




    public function update(Request $request, Authorization $authorization)
    {
        //
    }


    public function destroy(Authorization $authorization)
    {
        @unlink(public_path('/storage/authorization/'.$authorization->auth_image));
        $authorization->delete();
        return response(['data' => 'Job Opportunity deleted'], Response::HTTP_ACCEPTED);
    }
}
