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
            $table->enum('paying_status', ['Menunggu', 'Diterima', 'Ditolak']);
            $table->string('paying_photo')->nullable();
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
