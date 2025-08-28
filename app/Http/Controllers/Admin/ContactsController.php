<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Contacts;
use App\Http\Requests\Admin\StoreContactsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Delete Successfully');
    }

    public function inquiry(StoreContactsRequest $request)
    {
        $contact = $request->all();
        Contacts::create($contact);
        return redirect()->back()->with('message', 'Your message have been submitted successfully.');
    }

    public function popupinquiry(Request $request)
    {
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secretKey = env('RECAPTCHA_V3_SECRET_KEY');

        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => $secretKey,
                'response' => $recaptchaResponse
            ]
        ]);
        $body = json_decode((string)$response->getBody());

        if ($body->success) {
            $contact = $request->all();
            // return 'yes';
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required',
            ]);
            if ($validator->passes()) {
                Contacts::create($contact);
                return Response::json(['success' => 'Thank you, your enquiry has been Submitted Successfully']);
            }
            return Response::json(['errors' => $validator->errors()]);
        } else {
            // reCAPTCHA verification failed
            return response()->json(['errors' => ['captcha' => 'reCAPTCHA verification failed']]);
        }
    }
}
