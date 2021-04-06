<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanMesir extends Model
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
        'pm_jenjang',
        'pm_instansi',
        'pm_tempat',
        'pm_masuk',
        'pm_keluar',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'biodata_id' => 'integer',
        'pm_masuk' => 'date',
        'pm_keluar' => 'date',
    ];


    public function biodata()
    {
        return $this->belongsTo(\App\Models\Biodata::class);
    }
}
