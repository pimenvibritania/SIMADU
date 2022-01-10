<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Helpers\UploadImageHelper;
use App\Models\Mahasiswa\Fakultas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class Biodata extends Model
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
        'is_active' => 'boolean',
        'user_id' => 'integer',
        'verified_date' => 'datetime',
        'tanggal_lahir' => 'date',
        'berlaku_paspor_from' => 'date',
        'berlaku_paspor_to' => 'date',
        'tiba_mesir' => 'date',
        'tanggal_lapor' => 'date',
        'thn_masuk_s1' => 'date',
        'thn_masuk_s2' => 'date',
        'thn_masuk_s3' => 'date',
        'thn_lulus_s1' => 'date',
        'thn_lulus_s2' => 'date',
        'thn_lulus_s3' => 'date',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function riwayatPendidikan(){
        return $this->hasMany(RiwayatPendidikan::class);
    }

    public function pendidikanMesir(){
        return $this->hasMany(PendidikanMesir::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function tingkat()
    {
        return $this->belongsTo(MasterLevel::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function setImgProfileAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_profile',
            'public/uploads/biodata/img_profile'
        );
    }

    public function setImgKtpAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_ktp',
            'public/uploads/biodata/img_ktp'
        );
    }

    public function setImgAkteAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_akte',
            'public/uploads/biodata/img_akte'
        );
    }

    public function setImgPasporAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_paspor',
            'public/uploads/biodata/img_paspor'
        );
    }

    public function setImgIjazahAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_ijazah',
            'public/uploads/biodata/img_ijazah'
        );
    }

    public function setImgBuktiTinggalAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_bukti_tinggal',
            'public/uploads/biodata/img_bukti_tinggal'
        );
    }


    private function setImagesAttributes($value, $attribute_name, $destination_path)
    {
        $disk = Helper::disk();

        if ($value==null) {
            Storage::disk($disk)->delete($this->{$attribute_name});

            $this->attributes[$attribute_name] = null;
        }

        if (Str::startsWith($value, 'data:image'))
        {
            $filename = $this->user->email . '_' . time() . '.jpg';

            $this->publishImage($value, $destination_path, $disk, $filename, $attribute_name);
        }
        else
        {
            return $this->attributes[$attribute_name] = $value;
        }
    }

    private function publishImage($value, $destination_path, $disk, $filename, $attribute_name)
    {
        $image = Image::make($value)->encode('jpg', 90);

        Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

        Storage::disk($disk)->delete($this->{$attribute_name});

        $this->attributes[$attribute_name] = $filename;
    }

}
