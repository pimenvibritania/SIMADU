<?php

namespace App\Models\Mahasiswa;

use App\Models\ChangableWord;
use App\Models\Institute;
use App\Models\Jenjang;
use App\Models\Jurusan;
use App\Models\TandaTangan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuliahIftha extends Model
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
        'fakultas_id' => 'integer',
        'tanda_tangan_id' => 'integer',
        'tgl_ambil' => 'date',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function tandaTangan()
    {
        return $this->belongsTo(TandaTangan::class);
    }

    public function words(){
        return $this->belongsToMany(ChangableWord::class);
    }
}
