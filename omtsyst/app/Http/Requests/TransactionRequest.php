<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255|min:2',
            'last_name' => 'required|string|max:255|min:2',
            'phone_number' => 'required|string|max:15|min:6',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'rec_first_name' => 'required|string|max:255|min:2',
            'rec_last_name' => 'required', 'string|max:255|min:2',
            'rec_phone_number' => 'required|string|max:15|min:6',
            'rec_email' => 'string|email',
            'country_from' => 'required',
            'country_to' => 'required',
            'send_currency' => 'required|string',
            'amount' => 'required',
        ];
    }
}
