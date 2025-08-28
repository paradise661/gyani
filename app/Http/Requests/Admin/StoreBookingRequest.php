<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
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
        ];
    }
}
