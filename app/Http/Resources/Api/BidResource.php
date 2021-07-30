<?php

namespace App\Http\Resources\Api;

use App\Models\Api\Customer;
use App\Models\Api\Offer;
use App\Models\Api\Provider;
use Illuminate\Http\Resources\Json\JsonResource;

class BidResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $provider = Provider::find($this->id_provider);
        $offer = Offer::find($this->id_offer);
        $customer = Customer::find($offer->id_customer);

        return [
            'id' => $this->id,
            'provider' => [
                'name' => $provider->name,
                'doc' => $provider->doc
            ],
            'offer' => [
                'customer' => [
                    'name' => $customer->name,
                    'doc' => $customer->doc
                ],
                'from' => $offer->from,
                'to' => $offer->to,
                'initial_value' => $offer->initial_value,
                'amount' => $offer->amount,
                'amount_type' => $offer->amount_type
            ],
            'value' => $this->value,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
