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
            'code_client'   => 'required|numeric',
            'phone'         => 'required|digits:10',
            'mail'          => 'required|min:1|max:200|email|unique:App\Models\User,email',
            'address'       => 'required',
            'postal_code'   => 'required|digits:5',
            'city'          => 'required',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required'   => 'Veuillez renseigner le nom',
            'first_name.required'  => 'Veuillez renseigner le prénom',
            'code_client.required' => 'Veuillez renseigner le code client',
            'code_client.numeric'  => 'Veuillez renseigner uniquement des chiffres',
            'phone.required'       => 'Veuillez renseigner le numéro de téléphone',
            'phone.digits'         => 'Veuillez renseigner uniquement 10 chiffres',
            'mail.required'        => 'Veuillez renseigner le mail',
            'mail.unique'          => 'L\'addresse mail existe déjà',
            'address.required'     => 'Veuillez renseigner l\'adresse postale',
            'postal_code.required' => 'Veuillez renseigner le code postal',
            'postal_code.digits'   => 'Veuillez renseigner uniquement 5 chiffres',
            'city.required'        => 'Veuillez renseigner la ville',
        ];
    }
}
