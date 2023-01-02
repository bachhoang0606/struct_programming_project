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
        Schema::create('user_vouchers', function (Blueprint $table) {
            $table->integer('user_id');
            $table->foreign('user_id')->references('user_id')->on('coin_cards');
            $table->foreignId('voucher_id')->constrained();
            $table->timestamps();
            $table->primary(['user_id', 'voucher_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_vouchers');
    }
};
