<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paspors', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tgl_terbit');
            $table->string('no_lama');
            $table->string('no_baru');
            $table->date('berlaku');
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
        Schema::dropIfExists('paspors');
    }
}
