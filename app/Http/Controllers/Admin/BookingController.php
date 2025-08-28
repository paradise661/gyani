<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::latest()->paginate(20);
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('message', 'Delete Successfully');
    }

    public function book(StoreBookingRequest $request)
    {
        $booking = $request->all();
        Booking::create($booking);
        return redirect()->back()->with('message', 'Thank you, your enquiry has been submitted successfully');
    }

    public function popupbook(Request $request)
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
            $book = $request->all();
            // return 'yes';
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'traveldate' => 'required',
                'adults' => 'required',
                'childs' => 'required',
                'departure_city' => 'required',
                'duration' => 'required',
                'pageurl' => 'required',
                'message' => 'required',
            ]);
            if ($validator->passes()) {
                Booking::create($book);
                return Response::json(['success' => 'Thank you, your enquiry has been Submitted Successfully']);
            }
            return Response::json(['errors' => $validator->errors()]);
        } else {
            // reCAPTCHA verification failed
            return response()->json(['errors' => ['captcha' => 'reCAPTCHA verification failed']]);
        }
    }
}
