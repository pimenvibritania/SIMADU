<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangableWordIzinSakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changable_word_izin_sakit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('changable_word_id')->constrained('changable_words');
            $table->foreignId('izin_sakit_id')->constrained('izin_sakits');
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
        Schema::dropIfExists('changable_word_izin_sakit');
    }
}
