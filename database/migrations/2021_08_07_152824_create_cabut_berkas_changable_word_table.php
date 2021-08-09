<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabutBerkasChangableWordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabut_berkas_changable_word', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabut_berkas_id')->constrained('cabut_berkas');
            $table->foreignId('changable_word_id')->constrained('changable_words');
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
        Schema::dropIfExists('cabut_berkas_changable_word');
    }
}
