<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AktaLahir extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tgl_surat_rs' => 'date',
        'tgl_bukti' => 'date',
        'tgl_lahir_ibu' => 'date',
        'tgl_lahir_ayah' => 'date',
        'tgl_kawin' => 'date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tandaTangan(){
        return $this->belongsTo(TandaTangan::class);
    }

    public function setDatetimeAttribute($value) {
        $this->attributes['datetime'] = \Carbon\Carbon::parse($value);
    }

    public function setTglLahirAttribute($value) {
        $this->attributes['tgl_lahir'] = \Carbon\Carbon::parse($value);
    }

    private function getUser()
    {
        $user = User::find(request('user_id'));

        return $user;
    }

    public function setImgSkDokterAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_sk_dokter',
            'public/uploads/akta/sk_dokter'
        );
    }

    public function setImgPasporAyahAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_paspor_ayah',
            'public/uploads/akta/paspor_ayah'
        );
    }

    public function setImgPasporIbuAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_paspor_ibu',
            'public/uploads/akta/paspor_ibu'
        );
    }

    public function setImgIzinTinggalAyahAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_izin_tinggal_ayah',
            'public/uploads/akta/izin_ayah'
        );
    }

    public function setImgIzinTinggalIbuAttribute($value)
    {
        $this->setImagesAttributes(
            $value,
            'img_izin_tinggal_ibu',
            'public/uploads/akta/izin_ibu'
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
            $filename = $this->getUser()->email . '_' . time() . '.jpg';

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
