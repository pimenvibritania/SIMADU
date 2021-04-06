<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('img_profile')->nullable();
            $table->string('img_ktp');
            $table->string('img_akte');
            $table->string('img_paspor');
            $table->string('img_ijazah')->nullable();
            $table->string('no_induk');
            $table->string('nama');
            $table->string('kelamin');
            $table->string('agama');
            $table->string('pernikahan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('tinggi_badan');
            $table->string('jenis_vipa_1');
            $table->string('no_paspor');
            $table->string('jenis_paspor');
            $table->string('keluar_paspor');
            $table->date('berlaku_paspor_from');
            $table->date('berlaku_paspor_to');
            $table->date('tiba_mesir');
            $table->date('tanggal_lapor');
            $table->date('izin_tinggal');
            $table->string('pendidikan_akhir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('tujuan_mesir');
            $table->string('nama_pasangan')->nullable();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('alamat_ayah');
            $table->string('alamat_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('no_ayah');
            $table->string('no_ibu');
            $table->text('catatan')->nullable();
            $table->text('alamat_mesir');
            $table->string('kota_mesir');
            $table->string('provinsi_mesir');
            $table->string('no_mesir');
            $table->text('alamat_indo');
            $table->string('kecamatan_indo');
            $table->string('desa_indo');
            $table->string('kota_indo');
            $table->string('provinsi_indo');
            $table->string('pos_indo');
            $table->string('no_indo');
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
        Schema::dropIfExists('biodatas');
    }
}
