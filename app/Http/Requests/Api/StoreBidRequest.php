<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBidRequest extends FormRequest
{

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'id_provider' => 'required|exists:App\Models\Api\Provider,id',
            'id_offer' => 'required|exists:App\Models\Api\Offer,id',
            'value' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'amount' => 'required|regex:/^\d*(\.\d{1,2})?$/'
        ];
    }
}
