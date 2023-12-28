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
        Schema::table('ht_booking_vouchers', function (Blueprint $table) {
            $table->addColumn('date','start_date')->after('price_baby')->nullable();
            $table->addColumn('date','end_date')->after('start_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_vourchers', function (Blueprint $table) {
            //
        });
    }
};
