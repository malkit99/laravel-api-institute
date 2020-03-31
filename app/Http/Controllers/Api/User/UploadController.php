<?php

namespace App\Http\Controllers\Api\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UploadResource;
use App\Upload;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function uploadImage(Request $request, User $upload ){
        if($request->has('profile_image'))
        {
            @unlink(public_path('/storage/profile/'.$upload->profile_image));
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $profile_image ='profile_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/profile/'.$profile_image));
            $upload->profile_image = $profile_image;
            $upload->update();
            return response()->json(['data' => $upload ,'message' => 'Profile Image Upload']);
        }

        return response()->json(['message' => 'failed upload']);
    }
}
