<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vouchers', function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->unsignedInteger('minimun_price');
            $table->integer('quantium');
            $table->timestamp('effective_date');
            $table->timestamp('expiration_date');
            $table->timestamps();
        });

        Schema::create('freeships', function(Blueprint $table){
            $table->foreignId('voucher_id')->constrained();
            $table->unsignedInteger('price');
            $table->timestamps();

            $table->primary('voucher_id');
        });

        Schema::create('percent_discounts', function(Blueprint $table){
            $table->foreignId('voucher_id')->constrained();
            $table->unsignedInteger('percent');
            $table->integer('max_price');
            $table->timestamps();

            $table->primary('voucher_id');
        });

        Schema::create('price_discounts', function(Blueprint $table){
            $table->foreignId('voucher_id')->constrained();
            $table->unsignedInteger('price');
            $table->timestamps();

            $table->primary('voucher_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('priceDiscounts');
        Schema::drop('percentDiscounts');
        Schema::drop('freeships');
        Schema::drop('vouchers');
    }
};
