<?php

namespace App\Http\Controllers\Api\Course;

use App\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\ContentStoreRequest;
use App\Http\Resources\Course\ContentResource;
use App\Http\Resources\Course\SubjectResource;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentStoreRequest $request)
    {

        $subject = new Subject();
        $subject->subject_name = $request->subject_name;
        $subject->slug = Str::slug($request->subject_name , "-");
        if(!empty($request->get('contents'))){
            $subject->save();
            $id = $subject->id;
            $contents =$request->get('contents');
                for ($i=0; $i < count($contents) ; $i++) {
                    $content = new Content();
                    $content->subject_id = $id;
                    $content->content_id = $i+1;
                    $content->topic_name = $contents[$i]['topic_name'];
                    $content->topic_description =$contents[$i]['topic_description'];
                    $content->save();
                }
            }
        return response([ 'data' => new SubjectResource($subject) , 'message' => 'content created'], Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject , Content $content)
    {
        $subject = Subject::findOrFail($request->id);
        $subject->subject_name = $request->subject_name;
        $subject->slug = Str::slug($request->subject_name , "-");
        if(!empty($request->get('contents'))){
            $subject->update();
            $id = $subject->id;
            $contents =$request->get('contents');
                for ($i=0; $i < count($contents) ; $i++) {
                    $content->subject_id = $id;
                    $content->content_id = $i+1;
                    $content->topic_name = $contents[$i]['topic_name'];
                    $content->topic_description =$contents[$i]['topic_description'];
                    $content->update();
                }
            }
        return response([ 'data' => new SubjectResource($subject) , 'message' => 'content created'], Response::HTTP_CREATED);

        // return response(['data' => $request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
