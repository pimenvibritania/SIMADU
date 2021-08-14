<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'biodata_id',
        'rp_jenjang',
        'rp_instansi',
        'rp_tempat',
        'rp_masuk',
        'rp_keluar',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'biodata_id' => 'integer',
        'rp_masuk' => 'date',
        'rp_keluar' => 'date',
    ];


    public function biodata()
    {
        return $this->belongsTo(\App\Models\Biodata::class);
    }
}
