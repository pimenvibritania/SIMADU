<?php

namespace App\Models;

use App\Models\Mahasiswa\Fakultas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;

    protected $guarded = ['id'];

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
