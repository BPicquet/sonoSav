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
            'mail'          => 'required|min:1|max:150',
            'address'       => 'required',
            'postal_code'   => 'required|min:5|max:5',
            'city'          => 'required',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required'   => 'Veuillez renseigner le nom',
            'first_name.required'  => 'Veuillez renseigner le prénom',
            'code_client.required' => 'Veuillez renseigner le code client',
            'phone.required'       => 'Veuillez renseigner le numéro de téléphone',
            'phone.min'            => 'Veuillez indiquer minimun 10 caractères',
            'phone.max'            => 'Veuillez indiquer maximum 10 caractères',
            'mail.required'        => 'Veuillez renseigner le mail',
            'address.required'     => 'Veuillez renseigner l\'adresse postale',
            'postal_code.required' => 'Veuillez renseigner le code postal',
            'postal_code.min'      => 'Veuillez indiquer minimun 5 caractères',
            'postal_code.max'      => 'Veuillez indiquer maximum 5 caractères',
            'city.required'        => 'Veuillez renseigner la ville',
        ];
    }
}
