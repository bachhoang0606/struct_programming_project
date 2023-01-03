<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PercentDiscount extends Model
{
    use HasFactory;
    protected $primaryKey = 'voucher_id';

    protected $fillable = [
        'voucher_id',
        'percent',
        'max_price',
    ];

    public function voucher(){
        return $this->belongsTo(Voucher::class);
    }
}
