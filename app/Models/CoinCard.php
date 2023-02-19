<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinCard extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'coin',
        'name',
        'phone',
        'email'
    ];

    protected $attributes = [
        'phone' => '00000000',
    ];

    public function vouchers(){
        return $this->belongsToMany(Voucher::class, 'user_vouchers', 'user_id', 'voucher_id');
    }

    public function vouchersPayment(){
        return $this->belongsToMany(Voucher::class, 'user_vouchers', 'user_id', 'voucher_id')->where('expiration_date', '>=', now());
    }
}
