<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuliahIfthasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('kuliah_ifthas', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pelayanan')->default('Kuliah Iftha');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('institute_id')
                ->constrained('institutes');
            $table->foreignId('jenjang_id')
                ->constrained('jenjangs');
            $table->foreignId('fakultas_id')
                ->constrained('fakultas');
            $table->foreignId('jurusan_id')
                ->constrained('jurusans');
            $table->string('type')->default('mahasiswa');
            $table->string('no_permohonan');
            $table->string('no_surat');
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
        Schema::dropIfExists('kuliah_ifthas');
    }
}
