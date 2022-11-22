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
            $table->string('products')->nullable(true);
            $table->timestamp('outdate_at');
            $table->timestamps();
        });

        Schema::create('freeships', function(Blueprint $table){
            $table->foreignId('voucher_id')->constrained();
            $table->unsignedInteger('price');
            $table->timestamps();

            $table->primary('voucher_id');
        });

        Schema::create('percentDiscounts', function(Blueprint $table){
            $table->foreignId('voucher_id')->constrained();
            $table->unsignedInteger('percent');
            $table->integer('max_price');
            $table->timestamps();

            $table->primary('voucher_id');
        });

        Schema::create('priceDiscounts', function(Blueprint $table){
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
