<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legalisir extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable =[
      'user_id',
      'nama',
      'img_docs',
      'no_permohonan',
      'keperluan',
      'status',
      'jml_surat',
      'tgl_ambil'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
