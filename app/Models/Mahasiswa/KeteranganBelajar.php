<?php

namespace App\Models\Mahasiswa;

use App\Models\TandaTangan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;


class KeteranganBelajar extends Model
{
    use HasFactory;
    use CrudTrait;

//    protected $table = 'keter'
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tandaTangan(){
        return $this->belongsTo(TandaTangan::class);
    }
}
