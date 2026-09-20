<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('top_up_orders', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Order
            |--------------------------------------------------------------------------
            */

            $table->string('order_id')->unique();

            $table->string('game')->default('mobile-legends');

            /*
            |--------------------------------------------------------------------------
            | Customer
            |--------------------------------------------------------------------------
            */

            $table->string('user_id')->nullable();

            $table->string('server_id')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Product
            |--------------------------------------------------------------------------
            */

            $table->string('sku');

            $table->string('product_name');

            $table->decimal('price', 15, 2)->default(0);

            /*
            |--------------------------------------------------------------------------
            | Payment
            |--------------------------------------------------------------------------
            */

            $table->string('payment_method')->nullable();

            $table->string('payment_status')
                ->default('unpaid');

            /*
            |--------------------------------------------------------------------------
            | Digiflazz
            |--------------------------------------------------------------------------
            */

            $table->string('ref_id')->nullable()->unique();

            $table->string('provider_status')
                ->nullable();

            $table->string('provider_sn')
                ->nullable();

            $table->text('provider_message')
                ->nullable();

            $table->json('provider_response')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Transaction
            |--------------------------------------------------------------------------
            */

            $table->string('status')
                ->default('pending');

            $table->timestamp('paid_at')
                ->nullable();

            $table->timestamp('completed_at')
                ->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('top_up_orders');
    }
};