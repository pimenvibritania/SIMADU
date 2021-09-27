<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePindahKuliahIndonesiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('pindah_kuliah_indonesias', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pelayanan')->default('Pindah Kuliah Indonesia');
            $table->foreignId('user_id')->constrained('users')
                ->onDelete('cascade');
            $table->string('type')->default('mahasiswa');
            $table->string('no_permohonan');
            $table->string('no_surat');
            $table->string('tujuan');
            $table->string('keperluan');
            $table->foreignId('tanda_tangan_id')->nullable()
                ->constrained('tanda_tangans');
            $table->string('status');
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
        Schema::dropIfExists('pindah_kuliah_indonesias');
    }
}
