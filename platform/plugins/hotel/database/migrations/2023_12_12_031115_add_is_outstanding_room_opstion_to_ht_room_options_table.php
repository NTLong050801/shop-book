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
        Schema::table('ht_room_options', function (Blueprint $table) {
            $table->addColumn('boolean','is_outstanding_room_option')->after('status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ht_room_options', function (Blueprint $table) {
            $table->dropColumn('is_outstanding_room_option');
        });
    }
};
