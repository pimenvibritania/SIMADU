<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanMesirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('pendidikan_mesirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id')->constrained('biodatas');
            $table->string('pm_jenjang')->nullable();
            $table->string('pm_instansi')->nullable();
            $table->string('pm_tempat')->nullable();
            $table->date('pm_masuk')->nullable();
            $table->date('pm_keluar')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikan_mesirs');
    }
}
