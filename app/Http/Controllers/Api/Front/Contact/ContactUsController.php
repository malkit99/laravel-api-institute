<?php

namespace App\Http\Controllers\Api\Front\Contact;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactStoreRequest;
use App\Notifications\Contact\ContactFormNotification;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactUsController extends Controller
{

    public function store(ContactStoreRequest $request , Contact $contact)
    {
        $contact->name = $request->name;
        $contact->mobile = $request->mobile;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->contact_type = "Contact";
        $contact->save();
        $contact->notify(new ContactFormNotification);
        return response(['data' => 'Submit Successfully'], Response::HTTP_CREATED);
    }

}
