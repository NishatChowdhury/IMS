<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sslcommerz extends Model
{
    use HasFactory;
    protected $fillable = [
        'tran_id',
        'val_id',
        'amount',
        'cart_type',
        'store_amount',
        'card_no',
        'bank_tran_id',
        'status',
        'tran_date',
        'error',
        'currency',
        'card_issuer',
        'card_brand',
        'card_sub_brand',
        'card_issuer_country',
        'card_issuer_country_code',
        'store_id',
        'verify_sign',
        'verify_key',
        'verify_sign_sha2',
        'currency_type',
        'currency_amount',
        'currency_rate',
        'base_fair',
        'value_a',
        'value_b',
        'value_c',
        'value_d',
        'subscription_id',
        'risk_level',
        'risk_title',

    ];
}
