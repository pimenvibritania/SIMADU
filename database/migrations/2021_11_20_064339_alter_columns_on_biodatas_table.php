<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsOnBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->foreignId('institute_id')
                ->nullable()
                ->constrained('institutes')
                ->onDelete('CASCADE');
            $table->foreignId('fakultas_id')
                ->nullable()
                ->constrained('fakultas')
                ->onDelete('CASCADE');
            $table->foreignId('master_level_id')
                ->nullable()
                ->constrained('master_levels')
                ->onDelete('CASCADE');
            $table->foreignId('jenjang_id')
                ->nullable()
                ->constrained('jenjangs')
                ->onDelete('CASCADE');
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
