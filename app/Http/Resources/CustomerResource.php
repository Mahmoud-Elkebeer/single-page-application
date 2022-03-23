<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'country' => $this->country,
            'state' => $this->state,
            'countryCode' => '+' . $this->country_code,
            'phoneNumber' => $this->phone,
        ];
    }
}
