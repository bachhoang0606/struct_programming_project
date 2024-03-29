<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class VoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->type == 1){
            return [
                'id' =>$this->id,
                'titlle' => $this->title,
                'content' => $this->content,
                'minimun_price' => $this->minimun_price,
                'quantium' => $this->quantium,
                'total' => $this->total,
                'effective date' => $this->effective_date,
                'expiration_date' => $this->expiration_date,
                'type' => $this->type,
                'detail' => new FreeshipResource( $this->freeship ),
            ];
        }
        if($this->type == 2){
            return [
                'id' =>$this->id,
                'titlle' => $this->title,
                'content' => $this->content,
                'minimun_price' => $this->minimun_price,
                'quantium' => $this->quantium,
                'total' => $this->total,
                'effective date' => $this->effective_date,
                'expiration_date' => $this->expiration_date,
                'type' => $this->type,
                'detail' => new PriceDiscountResource( $this->priceDiscount ),
            ];
        }
        if($this->type == 3){
            return [
                'id' =>$this->id,
                'titlle' => $this->title,
                'content' => $this->content,
                'minimun_price' => $this->minimun_price,
                'quantium' => $this->quantium,
                'total' => $this->total,
                'effective date' => $this->effective_date,
                'expiration_date' => $this->expiration_date,
                'type' => $this->type,
                'detail' => new PercentDiscountResource( $this->percentDiscount ),
            ];
        }
    }
}
