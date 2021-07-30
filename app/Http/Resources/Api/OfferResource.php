<?php

namespace App\Http\Resources\Api;

use App\Models\Api\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $customer = Customer::find($this->id_customer);

        return [
            'id' => $this->id,
            'customer' => [
                'name' => $customer->name,
                'doc' => $customer->doc
            ],
            'from' => $this->from,
            'to' => $this->to,
            'initial_value' => $this->initial_value,
            'amount' => $this->amount,
            'amount_type' => $this->amount_type
        ];
    }
}
