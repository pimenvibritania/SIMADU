<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangableWordDaftarNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changable_word_daftar_nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('changable_word_id')->constrained('changable_words');
            $table->foreignId('daftar_nilai_id')->constrained('daftar_nilais');
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
        Schema::dropIfExists('changable_word_daftar_nilai');
    }
}
