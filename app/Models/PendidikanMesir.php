<?php

namespace App\Models;

use App\Models\Mahasiswa\Fakultas;
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

    protected $guarded =['id'];

    protected $casts = [
        'tgl_lapor' => 'datetime'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    function masterLevel()
    {
        return $this->belongsTo(MasterLevel::class);
    }

    public function setDatetimeAttribute($value) {
        $this->attributes['tgl_lapor'] = \Carbon\Carbon::parse($value);
    }
}
