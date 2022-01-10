<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id')
                ->constrained('biodatas')
                ->onDelete('CASCADE');
            $table->foreignId('institute_id')
                ->constrained('institutes')
                ->onDelete('CASCADE');
            $table->foreignId('fakultas_id')
                ->constrained('fakultas')
                ->onDelete('CASCADE');
            $table->foreignId('master_level_id')
                ->constrained('master_levels')
                ->onDelete('CASCADE');
            $table->foreignId('jenjang_id')
                ->constrained('jenjangs')
                ->onDelete('CASCADE');

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
        Schema::dropIfExists('pendidikan_users');
    }
}
