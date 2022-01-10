<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAIdTerritoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_id_territory', function (Blueprint $table) {
            $table->string('KODE_WILAYAH', 8)->primary();
            $table->string('MST_KODE_WILAYAH', 8);
            $table->string('NAMA', 255);
            $table->enum('LEVEL', ['1', '2', '3', '4']);
            $table->unique(['MST_KODE_WILAYAH', 'KODE_WILAYAH'], 'UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_id_territory');
    }
}
