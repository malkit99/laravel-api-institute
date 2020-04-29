<?php

namespace App\Http\Controllers\Api\JobOpportunity;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobOpportunity\JobOpportunityStoreRequest;
use App\Http\Resources\JobOpportunity\JobOpportunityResource;
use App\JobOpportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class JobOpportunityController extends Controller
{

    public function index(JobOpportunity $jobOpportunity)
    {
        $jobOpportunity = $jobOpportunity->all();
        return response(['data' => JobOpportunityResource::collection($jobOpportunity)], Response::HTTP_CREATED);
    }


    public function store(JobOpportunityStoreRequest $request , JobOpportunity $jobOpportunity)
    {
        if($request->has('job_image'))
        {
            $file = $request->file('job_image');
            $extension = $file->getClientOriginalExtension();
            $job_image ='job_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/job/'.$job_image));
            $job_image = $job_image;
        }

        $jobOpportunity->company_name = $request->company_name;
        $jobOpportunity->create = Auth::user()->id;
        $jobOpportunity->job_image = $job_image;
        $jobOpportunity->save();
        return response(['data' => new JobOpportunityResource($jobOpportunity)], Response::HTTP_CREATED);
    }


    public function show(JobOpportunity $jobOpportunity)
    {
        return response(['data' => new JobOpportunityResource($jobOpportunity)], Response::HTTP_CREATED);
    }



    public function updateById(JobOpportunityStoreRequest $request, JobOpportunity $jobOpportunity)
    {
        if(!$request->has('job_image')){

        }
        else{
            $file = $request->file('job_image');
            $extension = $file->getClientOriginalExtension();
            $job_image ='job_image_'.rand(1,1000).'_'.date('Ymdhis').'.'.$extension;
            Image::make($file)->resize(600,600)->save(public_path('/storage/job/'.$job_image));
            $job_image = $job_image;
        }

        $jobOpportunity->company_name = $request->company_name;
        $jobOpportunity->job_image = $job_image;
        $jobOpportunity->update();
        return response(['data' => new JobOpportunityResource($jobOpportunity)], Response::HTTP_CREATED);
    }


    public function destroy(JobOpportunity $jobOpportunity)
    {


        @unlink(public_path('/storage/job/'.$jobOpportunity->job_image));
        $jobOpportunity->delete();
        return response(['data' => 'Job Opportunity deleted'], Response::HTTP_ACCEPTED);

    }

    public function status(Request $request ,JobOpportunity $jobOpportunity)
    {
        if($request->status === true){
            $jobOpportunity->status = 1 ;
        }
        else{
            $jobOpportunity->status = 0 ;
        }
        $jobOpportunity->update();
        return response(['data' => new JobOpportunityResource($jobOpportunity)], Response::HTTP_CREATED);
    }
}
