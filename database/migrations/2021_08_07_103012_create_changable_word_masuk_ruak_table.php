<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangableWordMasukRuakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changable_word_masuk_ruak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('changable_word_id')->constrained('changable_words');
            $table->foreignId('masuk_ruak_id')->constrained('masuk_ruaks');
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
        Schema::dropIfExists('changable_word_masuk_ruak');
    }
}
