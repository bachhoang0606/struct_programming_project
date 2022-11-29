<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freeship extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_id',
        'price',
    ];
    protected $primaryKey = 'voucher_id';

    public function voucher(){
        return $this->belongsTo(Voucher::class);
    }
}
