<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangableWordCutiKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changable_word_cuti_kuliah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('changable_word_id')->constrained('changable_words');
            $table->foreignId('cuti_kuliah_id')->constrained('cuti_kuliahs');
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
        Schema::dropIfExists('changable_word_cuti_kuliah');
    }
}
