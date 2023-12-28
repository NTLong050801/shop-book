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
        Schema::table('ht_vouchers', function (Blueprint $table) {
            $table->integer('vouchers_end_days')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ht_vouchers', function (Blueprint $table) {
            $table->dropColumn('vouchers_end_days');
        });
    }
};
