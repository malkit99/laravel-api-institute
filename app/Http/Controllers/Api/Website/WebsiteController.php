<?php

namespace App\Http\Controllers\Api\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\WebsiteStoreRequest;
use App\Http\Resources\Website\WebsiteResource;
use App\Website;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Website $website)
    {
        $website = $website->all();
        return response(['data' => WebsiteResource::collection($website)], Response::HTTP_CREATED);
    }


    public function store(WebsiteStoreRequest $request , Website $website)
    {
        if($request->has('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $logo ='logo'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/logo/'.$logo));
            $logo = $logo;
        }
        $website->title = $request->title;
        $website->email = $request->email;
        $website->mobile = $request->mobile;
        $website->mobile_2 = $request->mobile_2;
        $website->facebook = $request->facebook;
        $website->insta = $request->insta;
        $website->twitter = $request->twitter;
        $website->linkedin = $request->linkedin;
        $website->address_line_1 = $request->address_line_1;
        $website->address_line_2 = $request->address_line_2;
        $website->state = $request->state;
        $website->city = $request->city;
        $website->district = $request->district;
        $website->pin_code = $request->pin_code;
        $website->logo = $logo;
        $website->save();
        return response(['data' => new WebsiteResource($website)], Response::HTTP_CREATED);
    }

    public function show(Website $website)
    {
        return response(['data' => new WebsiteResource($website)], Response::HTTP_CREATED);
    }




    public function update(Request $request, Website $website)
    {
        //
    }

    public function destroy(Website $website)
    {
        if($website->logo){
            @unlink(public_path('/storage/logo/'.$website->logo));
        }
        $website->delete();
        return response(['data' => 'Website Detail deleted']);
    }
}
