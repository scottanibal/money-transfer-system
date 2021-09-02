<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisapullRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'card_number' => 'required|min:16|max:16',
            'expiring_date' => 'required|min:5|max:5',
            'cvv' => 'required|max:3|min:3',
        ];
    }
}
