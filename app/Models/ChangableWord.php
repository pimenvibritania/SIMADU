<?php

namespace App\Models;

use App\Models\Mahasiswa\MasukKuliah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangableWord extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'is_active',
        'type'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
    ];

    public function masukKuliah(){
        return $this->belongsToMany(MasukKuliah::class);
    }
}
