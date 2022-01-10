<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pnbp extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'master_pnbp_id',
        'tanggal',
        'nama_pemohon',
        'kode_pnbp',
        'biaya',
        'keterangan',
        'jenis_pnbp'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'master_pnbp_id' => 'integer',
        'tanggal' => 'date',
    ];


    public function masterPnbp()
    {
        return $this->belongsTo(\App\Models\MasterPnbp::class);
    }
}
