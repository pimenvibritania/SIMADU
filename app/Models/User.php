<?php

namespace App\Models;

use App\Models\Mahasiswa\CabutBerkas;
use App\Models\Mahasiswa\CutiKuliah;
use App\Models\Mahasiswa\DaftarNilai;
use App\Models\Mahasiswa\IzinLibur;
use App\Models\Mahasiswa\IzinSakit;
use App\Models\Mahasiswa\IzinTawaquf;
use App\Models\Mahasiswa\KeringananBiaya;
use App\Models\Mahasiswa\KeteranganBelajar;
use App\Models\Mahasiswa\KeteranganLulus;
use App\Models\Mahasiswa\KetNonBeasiswa;
use App\Models\Mahasiswa\KuliahIftha;
use App\Models\Mahasiswa\MasukKuliah;
use App\Models\Mahasiswa\MasukMahad;
use App\Models\Mahasiswa\MasukRuak;
use App\Models\Mahasiswa\MintaTashdiq;
use App\Models\Mahasiswa\PindahFakultas;
use App\Models\Mahasiswa\PindahKuliahIndonesia;
use App\Models\Mahasiswa\PindahKuliahLuarNegeri;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Backpack\CRUD\app\Models\Traits\CrudTrait; // <------------------------------- this one
use Illuminate\Support\Carbon;
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one

class User extends Authenticatable implements MustVerifyEmail
{
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'verified_date',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified_date' => 'datetime',
    ];

    public function biodata(){
        return $this->hasOne(Biodata::class);
    }

    public function aktaLahir()
    {
        return $this->hasMany(AktaLahir::class);
    }

    public function izinTinggal(){
        return $this->hasMany(IzinTinggal::class);
    }

    public function alamatIndonesia()
    {
        return $this->hasMany(AlamatIndonesia::class);
    }

    public function alamatMesir()
    {
        return $this->hasMany(AlamatMesir::class);
    }

    public function cabutBerkas()
    {
        return $this->hasMany(CabutBerkas::class);
    }

    public function cutiKuliah()
    {
        return $this->hasMany(CutiKuliah::class);
    }

    public function daftarNilai()
    {
        return $this->hasMany(DaftarNilai::class);
    }

    public function izinLibur()
    {
        return $this->hasMany(IzinLibur::class);
    }

    public function izinSakit()
    {
        return $this->hasMany(IzinSakit::class);
    }

    public function izinTawaquf()
    {
        return $this->hasMany(IzinTawaquf::class);
    }

    public function kepentingan()
    {
        return $this->hasMany(Kepentingan::class);
    }

    public function keringananBiaya()
    {
        return $this->hasMany(KeringananBiaya::class);
    }

    public function ketNonBeasiswa()
    {
        return $this->hasMany(KetNonBeasiswa::class);
    }

    public function keteranganBelajar()
    {
        return $this->hasMany(KeteranganBelajar::class);
    }

    public function keteranganLulus()
    {
        return $this->hasMany(KeteranganLulus::class);
    }

    public function keteranganLahir()
    {
        return $this->hasMany(KeteranganLahir::class);
    }

    public function kuliahIftha()
    {
        return $this->hasMany(KuliahIftha::class);
    }

    public function legalisir()
    {
        return $this->hasMany(Legalisir::class);
    }

    public function masukKuliah()
    {
        return $this->hasMany(MasukKuliah::class);
    }

    public function masukMahad()
    {
        return $this->hasMany(MasukMahad::class);
    }

    public function masukMesir()
    {
        return $this->hasMany(MasukMesir::class);
    }

    public function masukRuak()
    {
        return $this->hasMany(MasukRuak::class);
    }

    public function mintaTashdiq()
    {
        return $this->hasMany(MintaTashdiq::class);
    }

    public function pengampunan()
    {
        return $this->hasMany(Pengampunan::class);
    }

    public function pindahFakultas()
    {
        return $this->hasMany(PindahFakultas::class);
    }

    public function pindahKuliahIndonesia()
    {
        return $this->hasMany(PindahKuliahIndonesia::class);
    }

    public function pindahKuliahLuarNegeri()
    {
        return $this->hasMany(PindahKuliahLuarNegeri::class);
    }

    public function tidakKeluarNegeri()
    {
        return $this->hasMany(TidakKeluarNegeri::class);
    }

    public function visaHaji()
    {
        return $this->hasMany(VisaHaji::class);
    }

    public function visaUmroh()
    {
        return $this->hasMany(VisaUmroh::class);
    }

    public function newTask(bool $filter = false)
    {
        $data = $this->aktaLahir()->where('status', '=', 'new')->get()
            ->concat($this->alamatIndonesia()->where('status', '=', 'new')->get())
            ->concat($this->alamatMesir()->where('status', '=', 'new')->get())
            ->concat($this->cabutBerkas()->where('status', '=', 'new')->get())
            ->concat($this->cutiKuliah()->where('status', '=', 'new')->get())
            ->concat($this->daftarNilai()->where('status', '=', 'new')->get())
            ->concat($this->izinLibur()->where('status', '=', 'new')->get())
            ->concat($this->izinSakit()->where('status', '=', 'new')->get())
            ->concat($this->izinTawaquf()->where('status', '=', 'new')->get())
            ->concat($this->izinTinggal()->where('status', '=', 'new')->get())
            ->concat($this->kepentingan()->where('status', '=', 'new')->get())
            ->concat($this->keringananBiaya()->where('status', '=', 'new')->get())
            ->concat($this->ketNonBeasiswa()->where('status', '=', 'new')->get())
            ->concat($this->keteranganBelajar()->where('status', '=', 'new')->get())
            ->concat($this->keteranganLahir()->where('status', '=', 'new')->get())
            ->concat($this->kuliahIftha()->where('status', '=', 'new')->get())
            ->concat($this->legalisir()->where('status', '=', 'new')->get())
            ->concat($this->masukKuliah()->where('status', '=', 'new')->get())
            ->concat($this->masukMahad()->where('status', '=', 'new')->get())
            ->concat($this->masukMesir()->where('status', '=', 'new')->get())
            ->concat($this->masukRuak()->where('status', '=', 'new')->get())
            ->concat($this->mintaTashdiq()->where('status', '=', 'new')->get())
            ->concat($this->pengampunan()->where('status', '=', 'new')->get())
            ->concat($this->pindahFakultas()->where('status', '=', 'new')->get())
            ->concat($this->pindahKuliahIndonesia()->where('status', '=', 'new')->get())
            ->concat($this->pindahKuliahLuarNegeri()->where('status', '=', 'new')->get())
            ->concat($this->tidakKeluarNegeri()->where('status', '=', 'new')->get())
            ->concat($this->visaHaji()->where('status', '=', 'new')->get())
            ->concat($this->visaUmroh()->where('status', '=', 'new')->get());

        if ($filter){
            $data = $data->filter(function ($value) {
                return $value->created_at->year === Carbon::now()->year;
            });

            $data = $data->filter(function ($value) {
                return $value->created_at->month === Carbon::now()->month;
            });
        }

        return $data;
    }

    public function approvedTask(bool $filter = false)
    {
        $data = $this->aktaLahir()->where('status', '=', 'disetujui')->get()
            ->concat($this->alamatIndonesia()->where('status', '=', 'disetujui')->get())
            ->concat($this->alamatMesir()->where('status', '=', 'disetujui')->get())
            ->concat($this->cabutBerkas()->where('status', '=', 'disetujui')->get())
            ->concat($this->cutiKuliah()->where('status', '=', 'disetujui')->get())
            ->concat($this->daftarNilai()->where('status', '=', 'disetujui')->get())
            ->concat($this->izinLibur()->where('status', '=', 'disetujui')->get())
            ->concat($this->izinSakit()->where('status', '=', 'disetujui')->get())
            ->concat($this->izinTawaquf()->where('status', '=', 'disetujui')->get())
            ->concat($this->izinTinggal()->where('status', '=', 'disetujui')->get())
            ->concat($this->kepentingan()->where('status', '=', 'disetujui')->get())
            ->concat($this->keringananBiaya()->where('status', '=', 'disetujui')->get())
            ->concat($this->ketNonBeasiswa()->where('status', '=', 'disetujui')->get())
            ->concat($this->keteranganBelajar()->where('status', '=', 'disetujui')->get())
            ->concat($this->keteranganLahir()->where('status', '=', 'disetujui')->get())
            ->concat($this->kuliahIftha()->where('status', '=', 'disetujui')->get())
            ->concat($this->legalisir()->where('status', '=', 'disetujui')->get())
            ->concat($this->masukKuliah()->where('status', '=', 'disetujui')->get())
            ->concat($this->masukMahad()->where('status', '=', 'disetujui')->get())
            ->concat($this->masukMesir()->where('status', '=', 'disetujui')->get())
            ->concat($this->masukRuak()->where('status', '=', 'disetujui')->get())
            ->concat($this->mintaTashdiq()->where('status', '=', 'disetujui')->get())
            ->concat($this->pengampunan()->where('status', '=', 'disetujui')->get())
            ->concat($this->pindahFakultas()->where('status', '=', 'disetujui')->get())
            ->concat($this->pindahKuliahIndonesia()->where('status', '=', 'disetujui')->get())
            ->concat($this->pindahKuliahLuarNegeri()->where('status', '=', 'disetujui')->get())
            ->concat($this->tidakKeluarNegeri()->where('status', '=', 'disetujui')->get())
            ->concat($this->visaHaji()->where('status', '=', 'disetujui')->get())
            ->concat($this->visaUmroh()->where('status', '=', 'disetujui')->get());

        if ($filter){
            $data = $data->filter(function ($value) {
                return $value->created_at->year === Carbon::now()->year;
            });

            $data = $data->filter(function ($value) {
                return $value->created_at->month === Carbon::now()->month;
            });
        }

        return $data;
    }

    public function declinedTask(bool $filter = false)
    {
        $data = $this->aktaLahir()->where('status', '=', 'ditolak')->get()
            ->concat($this->alamatIndonesia()->where('status', '=', 'ditolak')->get())
            ->concat($this->alamatMesir()->where('status', '=', 'ditolak')->get())
            ->concat($this->cabutBerkas()->where('status', '=', 'ditolak')->get())
            ->concat($this->cutiKuliah()->where('status', '=', 'ditolak')->get())
            ->concat($this->daftarNilai()->where('status', '=', 'ditolak')->get())
            ->concat($this->izinLibur()->where('status', '=', 'ditolak')->get())
            ->concat($this->izinSakit()->where('status', '=', 'ditolak')->get())
            ->concat($this->izinTawaquf()->where('status', '=', 'ditolak')->get())
            ->concat($this->izinTinggal()->where('status', '=', 'ditolak')->get())
            ->concat($this->kepentingan()->where('status', '=', 'ditolak')->get())
            ->concat($this->keringananBiaya()->where('status', '=', 'ditolak')->get())
            ->concat($this->ketNonBeasiswa()->where('status', '=', 'ditolak')->get())
            ->concat($this->keteranganBelajar()->where('status', '=', 'ditolak')->get())
            ->concat($this->keteranganLahir()->where('status', '=', 'ditolak')->get())
            ->concat($this->kuliahIftha()->where('status', '=', 'ditolak')->get())
            ->concat($this->legalisir()->where('status', '=', 'ditolak')->get())
            ->concat($this->masukKuliah()->where('status', '=', 'ditolak')->get())
            ->concat($this->masukMahad()->where('status', '=', 'ditolak')->get())
            ->concat($this->masukMesir()->where('status', '=', 'ditolak')->get())
            ->concat($this->masukRuak()->where('status', '=', 'ditolak')->get())
            ->concat($this->mintaTashdiq()->where('status', '=', 'ditolak')->get())
            ->concat($this->pengampunan()->where('status', '=', 'ditolak')->get())
            ->concat($this->pindahFakultas()->where('status', '=', 'ditolak')->get())
            ->concat($this->pindahKuliahIndonesia()->where('status', '=', 'ditolak')->get())
            ->concat($this->pindahKuliahLuarNegeri()->where('status', '=', 'ditolak')->get())
            ->concat($this->tidakKeluarNegeri()->where('status', '=', 'ditolak')->get())
            ->concat($this->visaHaji()->where('status', '=', 'ditolak')->get())
            ->concat($this->visaUmroh()->where('status', '=', 'ditolak')->get());

        if ($filter){
            $data = $data->filter(function ($value) {
                return $value->created_at->year === Carbon::now()->year;
            });

            $data = $data->filter(function ($value) {
                return $value->created_at->month === Carbon::now()->month;
            });
        }

        return $data;
    }

    public function allTask(bool $filter = false)
    {
        $data = $this->aktaLahir()->get()
            ->concat($this->alamatIndonesia()->get())
            ->concat($this->alamatMesir()->get())
            ->concat($this->cabutBerkas()->get())
            ->concat($this->cutiKuliah()->get())
            ->concat($this->daftarNilai()->get())
            ->concat($this->izinLibur()->get())
            ->concat($this->izinSakit()->get())
            ->concat($this->izinTawaquf()->get())
            ->concat($this->izinTinggal()->get())
            ->concat($this->kepentingan()->get())
            ->concat($this->keringananBiaya()->get())
            ->concat($this->ketNonBeasiswa()->get())
            ->concat($this->keteranganBelajar()->get())
            ->concat($this->keteranganLahir()->get())
            ->concat($this->kuliahIftha()->get())
            ->concat($this->legalisir()->get())
            ->concat($this->masukKuliah()->get())
            ->concat($this->masukMahad()->get())
            ->concat($this->masukMesir()->get())
            ->concat($this->masukRuak()->get())
            ->concat($this->mintaTashdiq()->get())
            ->concat($this->pengampunan()->get())
            ->concat($this->pindahFakultas()->get())
            ->concat($this->pindahKuliahIndonesia()->get())
            ->concat($this->pindahKuliahLuarNegeri()->get())
            ->concat($this->tidakKeluarNegeri()->get())
            ->concat($this->visaHaji()->get())
            ->concat($this->visaUmroh()->get());

        if ($filter){
            $data = $data->filter(function ($value) {
                return $value->created_at->year === Carbon::now()->year;
            });

            $data = $data->filter(function ($value) {
                return $value->created_at->month === Carbon::now()->month;
            });
        }

        return $data;
    }

}
