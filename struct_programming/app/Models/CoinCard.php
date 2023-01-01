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
    ];

    public function vouchers(){
        return $this->belongsToMany(Voucher::class, 'user_vouchers', 'user_id', 'voucher_id');
    }
}
