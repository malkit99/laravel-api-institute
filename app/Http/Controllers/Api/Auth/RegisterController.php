<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\RegisterResource;
use App\Http\Resources\User\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = User::with('roles')->get();
        return response(['data' => RegisterResource::collection($user)], Response::HTTP_CREATED);
    }

    public function store(UserStoreRequest $request , User $register)
    {
        if($request->has('profile_image'))
        {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $profile_image ='profile_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/profile/'.$profile_image));
            $profile_image = $profile_image;
        }
        $register->name = $request->name;
        $register->email = $request->email;
        $register->mobile = $request->mobile;
        $register->profile_image = $profile_image;
        $register->password = Hash::make("password");
        $register->save();
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $register->assignRole($roles);
        return response(['data' => new UserResource($register)] , Response::HTTP_CREATED);
    }


    public function show(User $register)
    {
        return response(['data' => new UserResource($register)] , Response::HTTP_CREATED);
    }


    public function updateById(UserUpdateRequest $request, User $register )
    {
        if(!$request->has('profile_image')){

        }
        else{
            @unlink(public_path('/storage/profile/'.$register->profile_image));
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $profile_image ='profile_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/profile/'.$profile_image));
            $profile_image = $profile_image;
        }
        $register->name = $request->name;
        $register->mobile = $request->mobile;
        $register->profile_image = $profile_image;
        $register->update();
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $register->syncRoles($roles);

        return response(['data' => new UserResource($register)] , Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $register)
    {
        if($register->profile_image){
            @unlink(public_path('/storage/profile/'.$register->profile_image));
        }
        $register->delete();

        return response()->json(['data' => 'User Deleted']);
    }
}
