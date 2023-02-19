<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PercentDiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'percent discount',
            'percent' => $this->percent,
            'max_price' => $this->max_price,
        ];
    }
}
