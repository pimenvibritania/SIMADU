<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangableWordIzinTawaqufTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changable_word_izin_tawaquf', function (Blueprint $table) {
            $table->id();
            $table->foreignId('changable_word_id')->constrained('changable_words');
            $table->foreignId('izin_tawaquf_id')->constrained('izin_tawaqufs');
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
        Schema::dropIfExists('changable_word_izin_tawaquf');
    }
}
