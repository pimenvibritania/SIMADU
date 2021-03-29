<?php

namespace App\Models\Surat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinTinggal extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'type',
        'no_permohonan',
        'no_surat',
        'tujuan',
        'keperluan',
        'tanda_tangan',
        'status',
        'jml_surat'
    ];

    protected $casts =[
        'id' => 'integer',
        'user_id' => 'integer',
        'jml_surat' => 'integer'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
