<?php

namespace App\Http\Controllers\Api\Contact;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactStoreRequest;
use App\Http\Resources\Contact\ContactResource;
use App\Notifications\Contact\ContactFormNotification;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{

    public function index(Contact $contact)
    {
        $contact = $contact->all();
        return response(['data' => ContactResource::collection($contact)], Response::HTTP_CREATED);
    }





    public function show(Contact $contact)
    {
        return response(['data' => new ContactResource($contact)], Response::HTTP_CREATED);
    }




    public function update(Request $request, Contact $contact)
    {
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->update();
        return response(['data' => new ContactResource($contact)], Response::HTTP_CREATED);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response(['data' => 'contact deleted'], Response::HTTP_ACCEPTED);
    }
}
