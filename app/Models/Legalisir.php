<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

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

    public function setImgDocsAttribute($value)
    {
        $attribute_name = "img_docs";
        $disk = "public";
        $destination_path = "uploads/legalisir/img_docs";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
