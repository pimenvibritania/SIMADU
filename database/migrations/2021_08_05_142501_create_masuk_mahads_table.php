<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasukMahadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('masuk_mahads', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pelayanan')->default('Masuk Mahad');
            $table->foreignId('user_id')->constrained();
            $table->string('jenjang');
            $table->string('type');
            $table->string('no_permohonan');
            $table->string('no_surat');
            $table->string('tujuan');
            $table->string('keperluan');
            $table->foreignId('tanda_tangan_id')->nullable()->constrained();
            $table->string('status');
            $table->integer('jml_surat');
            $table->date('tgl_ambil')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masuk_mahads');
    }
}
