<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsVerifiedOnBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->dateTime('verified_date')->change();
            $table->date('thn_masuk_s1')->change();
            $table->date('thn_masuk_s2')->change();
            $table->date('thn_masuk_s3')->change();
            $table->date('thn_lulus_s1')->change();
            $table->date('thn_lulus_s2')->change();
            $table->date('thn_lulus_s3')->change();
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
