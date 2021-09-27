<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaLahirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_lahirs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pelayanan')->default('Akta Lahir');
            $table->foreignId('user_id')->constrained('users');
            $table->string('no_surat');
            $table->string('no_permohonan');

//            Data Bayi
            $table->string('nama_bayi');
            $table->string('tempat_lahir');
            $table->dateTime('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('berat_kg');
            $table->string('berat_ons');
            $table->string('panjang');
            $table->string('kelahiran_ke');
            $table->string('anak_ke');
            $table->string('jenis_kelahiran');

//            Data rumah sakit
            $table->string('tempat_kelahiran');
            $table->string('no_surat_rs')->nullable();
            $table->string('tgl_surat_rs');
            $table->string('nama_rs');
            $table->string('alamat_rs');

//            Bukti pencatatan kelahiran
            $table->string('no_bukti');
            $table->string('tgl_bukti');
            $table->string('penerbit');

//            Data Ibu
            $table->string('nama_ibu');
            $table->string('no_paspor_ibu');
            $table->date('tgl_lahir_ibu');
            $table->integer('umur_ibu');
            $table->string('pekerjaan_ibu');
            $table->text('alamat_indo_ibu');
            $table->string('tlp_ibu_indo');
            $table->string('alamat_mesir_ibu');
            $table->string('tlp_ibu_mesir');
            $table->string('kewarganegaraan_ibu');
            $table->string('agama_ibu');

//            Data Ayah
            $table->string('nama_ayah');
            $table->date('tgl_lahir_ayah');
            $table->integer('umur_ayah');
            $table->string('pekerjaan_ayah');
            $table->text('alamat_indo_ayah');
            $table->string('tlp_ayah_indo');
            $table->string('alamat_mesir_ayah');
            $table->string('tlp_ayah_mesir');
            $table->string('no_paspor_ayah');
            $table->string('kewarganegaraan_ayah');
            $table->string('agama_ayah');

//            Bukti Nikah
            $table->date('tgl_kawin');
            $table->string('no_akta_kawin');
            $table->string('instansi_kawin');

//            Data Pelapor
            $table->string('nik_pelapor');
            $table->string('nama_pelapor');
            $table->string('hubungan');

//            Data Saksi
            $table->string('nik_saksi_1')->nullable();
            $table->string('nama_saksi_1');
            $table->string('nik_saksi_2')->nullable();
            $table->string('nama_saksi_2')->nullable();

//            Data upload
            $table->string('img_sk_dokter');
            $table->string('img_paspor_ayah');
            $table->string('img_paspor_ibu');
            $table->string('img_izin_tinggal_ayah');
            $table->string('img_izin_tinggal_ibu');

            $table->foreignId('tanda_tangan_id')
                ->nullable()->constrained('tanda_tangans');
            $table->string('alasan_ditolak')->nullable();
            $table->string('status')->default('new');
            $table->date('tgl_ambil')->nullable();
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
        Schema::dropIfExists('akta_lahirs');
    }
}
