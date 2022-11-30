<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable  =[
        'title',
        'content',
        'minimun_price',
        'quantium',
        'products',
        'effective_date',
        'expiration_date',
    ];

    protected $attributes = [
        'products' => '',
    ];

    public function freeship(){
        return $this->hasOne(Freeship::class);
    }

    public function priceDiscount(){
        return $this->hasOne(PriceDiscount::class);
    }

    public function percentDiscount(){
        return $this->hasOne(PercentDiscount::class);
    }
}
