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
        Schema::table('ht_rooms', function (Blueprint $table) {
            $table->decimal('price_old', 15,0)->after('price')->nullable();
        });
        Schema::table('ht_tours', function (Blueprint $table) {
            $table->decimal('price_old', 15,0)->after('price')->nullable();
        });
        Schema::table('ht_vouchers', function (Blueprint $table) {
            $table->decimal('price_old', 15,0)->after('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ht_rooms', function (Blueprint $table) {
            $table->dropColumn('price_old');
        });
        Schema::table('ht_tours', function (Blueprint $table) {
            $table->dropColumn('price_old');
        });
        Schema::table('ht_vouchers', function (Blueprint $table) {
            $table->dropColumn('price_old');
        });
    }
};
