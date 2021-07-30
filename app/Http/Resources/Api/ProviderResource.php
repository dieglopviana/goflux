<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'doc' => $this->doc,
            'about' => $this->about,
            'active' => $this->active ? true : false,
            'site' => $this->site,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

}
