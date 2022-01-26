<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'customer_id'           => 'required',
            'number_invoice'        => 'required',
            'purchase_date'         => 'required',
            'category'              => 'required|max:200',
            'brand'                 => 'required|max:200',
            'model'                 => 'required|max:200',
            'serial_number'         => 'required',
            'breakdown'             => 'required|min:10',
            'exchange_type'         => 'required',
            'exchange_number'       => 'required',
            'prior_agreement'       => 'required|min:10',
            'price'                 => 'required',
            'rules_checkbox'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'number_invoice.required'   => 'Veuillez renseigner le numéro de facture',
            'purchase_date.required'    => 'Veuillez renseigner la date d\'achat',
            'category.required'         => 'Veuillez renseigner la catégorie du produit',
            'brand.required'            => 'Veuillez renseigner la marque du produit',
            'model.required'            => 'Veuillez renseigner le modèle du produit',
            'serial_number.required'    => 'Veuillez renseigner le numéro de série du produit',
            'breakdown.required'        => 'Veuillez renseigner la panne du produit',
            'breakdown.min'             => 'Veuillez décrire plus en détail la panne du produit',
            'exchange_type.required'    => 'Veuillez renseigner le type d\'échange',
            'exchange_number.required'  => 'Veuillez renseigner le numéro d\'échange',
            'prior_agreement.required'  => 'Veuillez renseigner les accords préalable',
            'prior_agreement.min'       => 'Veuillez décrire plus précisemment les accords préalable',
            'price.required'            => 'Veuillez indiquer le prix du S.A.V',
            'rules_checkbox.required'            => 'Veuillez accepter les règles du S.A.V',
        ];
    }
}
