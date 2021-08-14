<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePnbpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('pnbps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_pnbp_id')->constrained();
            $table->date('tanggal');
            $table->string('nama_pemohon');
            $table->string('kode_pnbp');
            $table->string('biaya');
            $table->string('keterangan');
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
        Schema::dropIfExists('pnbps');
    }
}
