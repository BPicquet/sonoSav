<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'last_name'     => 'required',
            'first_name'    => 'required',
            'code_client'   => 'required',
            'phone'         => 'required|min:10|max:10',
            'mail'          => 'required|min:1|max:100',
            'address'       => 'required',
            'postal_code'   => 'required|min:5|max:5',
            'city'          => 'required',
        ];
    }
}
