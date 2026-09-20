<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TopUpOrder extends Model
{
    protected $table = 'top_up_orders';

    protected $fillable = [

        'order_id',

        'game',

        'user_id',

        'server_id',

        'sku',

        'product_name',

        'price',

        'payment_method',

        'payment_status',

        'status',

        'ref_id',

        'provider_status',

        'provider_sn',

        'provider_message',

        'provider_response',

        'paid_at',

        'completed_at',

    ];

    protected $casts = [

        'price' => 'integer',

        'provider_response' => 'array',

        'paid_at' => 'datetime',

        'completed_at' => 'datetime',

    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {

            if (!$order->order_id) {

                $order->order_id =
                    'TRING-' .
                    strtoupper(
                        Str::random(16)
                    );

            }

        });
    }
}