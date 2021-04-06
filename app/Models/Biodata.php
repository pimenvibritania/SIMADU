<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_active',
        'user_id',
        'img_profile',
        'img_ktp',
        'img_akte',
        'img_paspor',
        'img_ijazah',
        'no_induk',
        'nama',
        'kelamin',
        'agama',
        'pernikahan',
        'tempat_lahir',
        'tanggal_lahir',
        'tinggi_badan',
        'jenis_vipa_1',
        'no_paspor',
        'jenis_paspor',
        'keluar_paspor',
        'berlaku_paspor_from',
        'berlaku_paspor_to',
        'tiba_mesir',
        'tanggal_lapor',
        'izin_tinggal',
        'pendidikan_akhir',
        'pekerjaan',
        'tujuan_mesir',
        'nama_pasangan',
        'nama_ayah',
        'nama_ibu',
        'alamat_ayah',
        'alamat_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'no_ayah',
        'no_ibu',
        'catatan',
        'alamat_mesir',
        'kota_mesir',
        'provinsi_mesir',
        'no_mesir',
        'alamat_indo',
        'kecamatan_indo',
        'desa_indo',
        'kota_indo',
        'provinsi_indo',
        'pos_indo',
        'no_indo',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
        'user_id' => 'integer',
        'tanggal_lahir' => 'date',
        'berlaku_paspor_from' => 'date',
        'berlaku_paspor_to' => 'date',
        'tiba_mesir' => 'date',
        'tanggal_lapor' => 'date',
        'izin_tinggal' => 'date',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function riwayatPendidikan(){
        return $this->hasMany(RiwayatPendidikan::class);
    }

    public function pendidikanMesir(){
        return $this->hasMany(PendidikanMesir::class);
    }
}
