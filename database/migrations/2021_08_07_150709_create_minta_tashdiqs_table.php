<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMintaTashdiqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('minta_tashdiqs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pelayanan')->default('Minta Tashdiq');
            $table->foreignId('user_id')->constrained();
            $table->string('type')->default('mahasiswa');
            $table->string('no_permohonan');
            $table->string('no_surat');
            $table->integer('thn_ajaran');
            $table->string('tujuan');
            $table->string('keperluan');
            $table->foreignId('tanda_tangan_id')->nullable()->constrained();
            $table->string('status')->default('new');
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
        Schema::dropIfExists('minta_tashdiqs');
    }
}
