<?php

namespace App\Models\Mahasiswa;

use App\Models\ChangableWord;
use App\Models\Jenjang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasukMahad extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'tanda_tangan_id' => 'integer',
        'tgl_ambil' => 'date',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function tandaTangan()
    {
        return $this->belongsTo(\App\Models\TandaTangan::class);
    }

    public function words(){
        return $this->belongsToMany(ChangableWord::class);
    }
}
