<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsNipAndNiwOnBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->string('nip')
                ->default('-')->change();
            $table->string('niw')
                ->default('-')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            //
        });
    }
}
