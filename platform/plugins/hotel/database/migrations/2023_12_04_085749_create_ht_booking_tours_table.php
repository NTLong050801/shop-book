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
        Schema::create('ht_booking_tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id');
            $table->foreignId('tour_id')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('price_child', 15, 2)->nullable();
            $table->decimal('price_baby', 15, 2)->nullable();
            $table->foreignId('currency_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ht_booking_tours');
    }
};
