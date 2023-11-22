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
        Schema::table('pencatatan', function (Blueprint $table) {
            $table->enum('status', ['Menunggu', 'Diterima', 'Ditolak']);
            $table->dateTime('tanggal_buat')->default('2023-11-13 12:34:56');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pencatatan', function (Blueprint $table) {
            //
        });
    }
};
