<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBiodatasColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->string('img_bukti_tinggal');
            $table->string('pasangan_nama')->nullable();
            $table->string('pasangan_paspor')->nullable();
            $table->string('pasangan_no')->nullable();
            $table->string('pasangan_img_paspor')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            //
        });
    }
}
