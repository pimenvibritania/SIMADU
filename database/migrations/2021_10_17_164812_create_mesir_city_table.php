<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesirCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesir_city', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mesir_prov_id')
                ->constrained('mesir_prov')
                ->onDelete('CASCADE');
            $table->string('city_name');
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
        Schema::dropIfExists('mesir_city');
    }
}
