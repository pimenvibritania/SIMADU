<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanMesirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('pendidikan_mesirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users');
            $table->string('thn_ajaran');
            $table->dateTime('tgl_lapor');
            $table->foreignId('jenjang_id')
                ->constrained('jenjangs');
            $table->foreignId('institute_id')
                ->constrained('institutes');
            $table->foreignId('fakultas_id')
                ->constrained('fakultas');
            $table->foreignId('jurusan_id')
                ->constrained('jurusans');
            $table->foreignId('master_level_id')
                ->constrained('master_levels');
            $table->string('ket_naik');
            $table->string('nilai');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('pendidikan_mesirs');
    }
}
