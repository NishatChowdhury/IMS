<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tran_id',
        'val_id',
        'amount',
        'card_type',
        'store_amount',
        'card_no',
        'bank_tran_id',
        'status',
        'card_issuer',
        'card_brand',
    ];
    public function onlinePaymentable()
    {
        return $this->morphTo();
    }

}
