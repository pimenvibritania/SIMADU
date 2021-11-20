<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_organisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organisasi_id')
                ->constrained('organisasis')
                ->onDelete('CASCADE');
            $table->foreignId('biodata_id')
                ->constrained('biodatas')
                ->onDelete('CASCADE');
            $table->boolean('is_active')
                ->nullable()
                ->default(true);
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
        Schema::dropIfExists('anggota_organisasis');
    }
}
