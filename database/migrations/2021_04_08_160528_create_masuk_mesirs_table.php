<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasukMesirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masuk_mesirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('no_permohonan');
            $table->string('no_surat');
            $table->string('jenis_pelayanan')->default('Masuk Mesir');
            $table->string('tujuan')->nullable();
            $table->string('keperluan')->nullable();
            $table->foreignId('tanda_tangan_id')->nullable()->constrained('tanda_tangans');
            $table->string('status')->default('new');
            $table->integer('jml_surat');
            $table->date('tgl_ambil')->nullable();
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
        Schema::dropIfExists('masuk_mesirs');
    }
}
