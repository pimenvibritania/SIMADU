<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->renameColumn('no_induk', 'nip');
            $table->string('niw')->nullable();
            $table->string('noreg');
            $table->string('nama_mediator');
            $table->string('kontak_mediator');
            $table->string('nama_mitra_mediator');
            $table->string('kontak_mitra_mediator');
            $table->dateTime('verified_date')->nullable();
            $table->date('thn_masuk_s1')->nullable();
            $table->date('thn_masuk_s2')->nullable();
            $table->date('thn_masuk_s3')->nullable();
            $table->date('thn_lulus_s1')->nullable();
            $table->date('thn_lulus_s2')->nullable();
            $table->date('thn_lulus_s3')->nullable();
            $table->string('verified_by')->nullable();
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
