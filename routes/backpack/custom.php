<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
use App\Http\Controllers\Admin\AktaLahirCrudController;
use App\Http\Controllers\Admin\AlamatIndonesiaCrudController;
use App\Http\Controllers\Admin\AlamatMesirCrudController;
use App\Http\Controllers\Admin\CabutBerkasCrudController;
use App\Http\Controllers\Admin\ChangableWordCrudController;
use App\Http\Controllers\Admin\CutiKuliahCrudController;
use App\Http\Controllers\Admin\DaftarNilaiCrudController;
use App\Http\Controllers\Admin\IzinLiburCrudController;
use App\Http\Controllers\Admin\IzinSakitCrudController;
use App\Http\Controllers\Admin\IzinTawaqufCrudController;
use App\Http\Controllers\Admin\IzinTinggalCrudController;
use App\Http\Controllers\Admin\KepentinganCrudController;
use App\Http\Controllers\Admin\KeringananBiayaCrudController;
use App\Http\Controllers\Admin\KeteranganBelajarCrudController;
use App\Http\Controllers\Admin\KeteranganLahirCrudController;
use App\Http\Controllers\Admin\KetNonBeasiswaCrudController;
use App\Http\Controllers\Admin\KuliahIfthaCrudController;
use App\Http\Controllers\Admin\LegalisirCrudController;
use App\Http\Controllers\Admin\MasterPnbpCrudController;
use App\Http\Controllers\Admin\JurusanCrudController;
use App\Http\Controllers\Admin\MasukKuliahCrudController;
use App\Http\Controllers\Admin\MasukMahadCrudController;
use App\Http\Controllers\Admin\MasukMesirCrudController;
use App\Http\Controllers\Admin\MasukRuakCrudController;
use App\Http\Controllers\Admin\MintaTashdiqCrudController;
use App\Http\Controllers\Admin\PengampunanCrudController;
use App\Http\Controllers\Admin\PindahFakultasCrudController;
use App\Http\Controllers\Admin\PindahKuliahIndonesiaCrudController;
use App\Http\Controllers\Admin\PindahKuliahLuarNegeriCrudController;
use App\Http\Controllers\Admin\RiwayatPendidikanCrudController;
use App\Http\Controllers\Admin\TidakKeluarNegeriCrudController;
use App\Http\Controllers\Admin\VisaHajiCrudController;
use App\Http\Controllers\Admin\VisaUmrohCrudController;

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'role:admin'],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('permission', 'PermissionCrudController');
    Route::crud('role', 'RoleCrudController');

    Route::crud('biodata', 'BiodataCrudController');
    Route::crud('riwayatpendidikan', 'RiwayatPendidikanCrudController');
    Route::crud('pendidikanmesir', 'PendidikanMesirCrudController');

    Route::crud('master-pnbp', 'MasterPnbpCrudController');
    Route::post('master-pnbp/ajax', [MasterPnbpCrudController::class, 'ajax'])
    ->name('pnbp_ajax');
    Route::crud('pnbp', 'PnbpCrudController');
    Route::crud('paspor', 'PasporCrudController');

    Route::crud('institutes', 'InstituteCrudController');
    Route::crud('jenjang', 'JenjangCrudController');
    Route::crud('level', 'LevelCrudController');
    Route::crud('fakultas', 'FakultasCrudController');
    Route::crud('jurusan', 'JurusanCrudController');
    Route::crud('agama', 'AgamaCrudController');
    Route::crud('jenis-paspor', 'JenisPasporCrudController');

    Route::crud('tandatangan', 'TandaTanganCrudController');

    Route::crud('changableword', 'ChangableWordCrudController');
    Route::get('changable-word/{id}', [ChangableWordCrudController::class, 'ajax'])
    ->name('changable-ajax');
    Route::get('changable-word-kb/{id}', [ChangableWordCrudController::class, 'kb']);

    Route::group([
        'prefix' => 'ajax'
    ], function () {
        Route::get('rprelation',[RiwayatPendidikanCrudController::class, 'ajax'] ) ;
});


});

Route::group([
     'middleware' => ['web', 'role:admin|admin_konsuler'],
     'prefix'     => config('backpack.base.route_prefix', 'admin'),
     'namespace'  => 'App\Http\Controllers\Admin',
 ], function () {

    Route::crud('izintinggal', 'IzinTinggalCrudController');
    Route::post('izintinggal/{id}/approve', [IzinTinggalCrudController::class, 'approve']);
    Route::post('izintinggal/{id}/decline', [IzinTinggalCrudController::class, 'decline']);
    Route::get('izintinggal/{id}/print', [IzinTinggalCrudController::class, 'print']);

    Route::crud('pengampunans', 'PengampunanCrudController');
    Route::post('pengampunans/{id}/approve', [PengampunanCrudController::class, 'approve']);
    Route::post('pengampunans/{id}/decline', [PengampunanCrudController::class, 'decline']);
    Route::get('pengampunans/{id}/print', [PengampunanCrudController::class, 'print']);

    Route::crud('alamatmesir', 'AlamatMesirCrudController');
    Route::post('alamatmesir/{id}/approve', [AlamatMesirCrudController::class, 'approve']);
    Route::post('alamatmesir/{id}/decline', [AlamatMesirCrudController::class, 'decline']);
    Route::get('alamatmesir/{id}/print', [AlamatMesirCrudController::class, 'print']);

    Route::crud('alamatindonesia', 'AlamatIndonesiaCrudController');
    Route::post('alamatindonesia/{id}/approve', [AlamatIndonesiaCrudController::class, 'approve']);
    Route::post('alamatindonesia/{id}/decline', [AlamatIndonesiaCrudController::class, 'decline']);
    Route::get('alamatindonesia/{id}/print', [AlamatIndonesiaCrudController::class, 'print']);


    Route::crud('masukmesir', 'MasukMesirCrudController');
    Route::post('masukmesir/{id}/approve', [MasukMesirCrudController::class, 'approve']);
    Route::post('masukmesir/{id}/decline', [MasukMesirCrudController::class, 'decline']);
    Route::get('masukmesir/{id}/print', [MasukMesirCrudController::class, 'print']);

    Route::crud('visahaji', 'VisaHajiCrudController');
    Route::post('visahaji/{id}/approve', [VisaHajiCrudController::class, 'approve']);
    Route::post('visahaji/{id}/decline', [VisaHajiCrudController::class, 'decline']);
    Route::get('visahaji/{id}/print', [VisaHajiCrudController::class, 'print']);

    Route::crud('visaumroh', 'VisaUmrohCrudController');
    Route::post('visaumroh/{id}/approve', [VisaUmrohCrudController::class, 'approve']);
    Route::post('visaumroh/{id}/decline', [VisaUmrohCrudController::class, 'decline']);
    Route::get('visaumroh/{id}/print', [VisaUmrohCrudController::class, 'print']);

    Route::crud('tidak-keluarnegeri', 'TidakKeluarNegeriCrudController');
    Route::post('tidak-keluarnegeri/{id}/approve', [TidakKeluarNegeriCrudController::class, 'approve']);
    Route::post('tidak-keluarnegeri/{id}/decline', [TidakKeluarNegeriCrudController::class, 'decline']);
    Route::get('tidak-keluarnegeri/{id}/print', [TidakKeluarNegeriCrudController::class, 'print']);

    Route::crud('kepentingans', 'KepentinganCrudController');
    Route::post('kepentingans/{id}/approve', [KepentinganCrudController::class, 'approve']);
    Route::post('kepentingans/{id}/decline', [KepentinganCrudController::class, 'decline']);
    Route::get('kepentingans/{id}/print', [KepentinganCrudController::class, 'print']);

    Route::crud('keteranganlahir', 'KeteranganLahirCrudController');
    Route::post('keteranganlahir/{id}/approve', [KeteranganLahirCrudController::class, 'approve']);
    Route::post('keteranganlahir/{id}/decline', [KeteranganLahirCrudController::class, 'decline']);
    Route::get('keteranganlahir/{id}/print', [KeteranganLahirCrudController::class, 'print']);

    Route::crud('legalisirs', 'LegalisirCrudController');
    Route::post('legalisirs/{id}/approve', [LegalisirCrudController::class, 'approve']);
    Route::post('legalisirs/{id}/decline', [LegalisirCrudController::class, 'decline']);
    Route::get('legalisirs/{id}/print', [LegalisirCrudController::class, 'print']);

    Route::crud('aktalahir', 'AktaLahirCrudController');
    Route::post('aktalahir/{id}/approve', [AktaLahirCrudController::class, 'approve']);
    Route::post('aktalahir/{id}/decline', [AktaLahirCrudController::class, 'decline']);
    Route::get('aktalahir/{id}/print', [AktaLahirCrudController::class, 'print']);
    Route::get('aktalahir/{id}/delete', [AktaLahirCrudController::class, 'delete']);
});

Route::group([
     'middleware' => ['web', 'role:admin|admin_mahasiswa'],
     'prefix'     => config('backpack.base.route_prefix', 'admin'),
     'namespace'  => 'App\Http\Controllers\Admin',
 ], function () {
    //Mahasiswa Routes
    Route::crud('pendidikanmesir', 'PendidikanMesirCrudController');

    Route::crud('keteranganbelajar', 'KeteranganBelajarCrudController');
    Route::post('keteranganbelajar/{id}/approve', [KeteranganBelajarCrudController::class, 'approve']);
    Route::post('keteranganbelajar/{id}/decline', [KeteranganBelajarCrudController::class, 'decline']);
    Route::get('keteranganbelajar/{id}/print', [KeteranganBelajarCrudController::class, 'print']);

    Route::crud('pindah-kuliahindonesia', 'PindahKuliahIndonesiaCrudController');
    Route::post('pindah-kuliahindonesia/{id}/approve', [PindahKuliahIndonesiaCrudController::class, 'approve']);
    Route::post('pindah-kuliahindonesia/{id}/decline', [PindahKuliahIndonesiaCrudController::class, 'decline']);
    Route::get('pindah-kuliahindonesia/{id}/print', [PindahKuliahIndonesiaCrudController::class, 'print']);

    Route::crud('pindahkuliahluarnegeri', 'PindahKuliahLuarNegeriCrudController');
    Route::post('pindahkuliahluarnegeri/{id}/approve', [PindahKuliahLuarNegeriCrudController::class, 'approve']);
    Route::post('pindahkuliahluarnegeri/{id}/decline', [PindahKuliahLuarNegeriCrudController::class, 'decline']);
    Route::get('pindahkuliahluarnegeri/{id}/print', [PindahKuliahLuarNegeriCrudController::class, 'print']);

    Route::crud('masukkuliah', 'MasukKuliahCrudController');
    Route::post('masukkuliah/{id}/approve', [MasukKuliahCrudController::class, 'approve']);
    Route::post('masukkuliah/{id}/decline', [MasukKuliahCrudController::class, 'decline']);
    Route::get('masukkuliah/{id}/print', [MasukKuliahCrudController::class, 'print']);

    Route::crud('kuliahiftha', 'KuliahIfthaCrudController');
    Route::post('kuliahiftha/{id}/approve', [KuliahIfthaCrudController::class, 'approve']);
    Route::post('kuliahiftha/{id}/decline', [KuliahIfthaCrudController::class, 'decline']);
    Route::get('kuliahiftha/{id}/print', [KuliahIfthaCrudController::class, 'print']);

    Route::crud('masukmahad', 'MasukMahadCrudController');
    Route::post('masukmahad/{id}/approve', [MasukMahadCrudController::class, 'approve']);
    Route::post('masukmahad/{id}/decline', [MasukMahadCrudController::class, 'decline']);
    Route::get('masukmahad/{id}/print', [MasukMahadCrudController::class, 'print']);

    Route::crud('ketnonbeasiswa', 'KetNonBeasiswaCrudController');
    Route::post('ketnonbeasiswa/{id}/approve', [KetNonBeasiswaCrudController::class, 'approve']);
    Route::post('ketnonbeasiswa/{id}/decline', [KetNonBeasiswaCrudController::class, 'decline']);
    Route::get('ketnonbeasiswa/{id}/print', [KetNonBeasiswaCrudController::class, 'print']);

    Route::crud('pindahfakultas', 'PindahFakultasCrudController');
    Route::post('pindahfakultas/{id}/approve', [PindahFakultasCrudController::class, 'approve']);
    Route::post('pindahfakultas/{id}/decline', [PindahFakultasCrudController::class, 'decline']);
    Route::get('pindahfakultas/{id}/print', [PindahFakultasCrudController::class, 'print']);

    Route::crud('masukruak', 'MasukRuakCrudController');
    Route::post('masukruak/{id}/approve', [MasukRuakCrudController::class, 'approve']);
    Route::post('masukruak/{id}/decline', [MasukRuakCrudController::class, 'decline']);
    Route::get('masukruak/{id}/print', [MasukRuakCrudController::class, 'print']);

    Route::crud('cutikuliah', 'CutiKuliahCrudController');
    Route::post('cutikuliah/{id}/approve', [CutiKuliahCrudController::class, 'approve']);
    Route::post('cutikuliah/{id}/decline', [CutiKuliahCrudController::class, 'decline']);
    Route::get('cutikuliah/{id}/print', [CutiKuliahCrudController::class, 'print']);

    Route::crud('cabutberkas', 'CabutBerkasCrudController');
    Route::post('cabutberkas/{id}/approve', [CabutBerkasCrudController::class, 'approve']);
    Route::post('cabutberkas/{id}/decline', [CabutBerkasCrudController::class, 'decline']);
    Route::get('cabutberkas/{id}/print', [CabutBerkasCrudController::class, 'print']);

    Route::crud('daftarnilai', 'DaftarNilaiCrudController');
    Route::post('daftarnilai/{id}/approve', [DaftarNilaiCrudController::class, 'approve']);
    Route::post('daftarnilai/{id}/decline', [DaftarNilaiCrudController::class, 'decline']);
    Route::get('daftarnilai/{id}/print', [DaftarNilaiCrudController::class, 'print']);

    Route::crud('keringananbiaya', 'KeringananBiayaCrudController');
    Route::post('keringananbiaya/{id}/approve', [KeringananBiayaCrudController::class, 'approve']);
    Route::post('keringananbiaya/{id}/decline', [KeringananBiayaCrudController::class, 'decline']);
    Route::get('keringananbiaya/{id}/print', [KeringananBiayaCrudController::class, 'print']);

    Route::crud('mintatashdiq', 'MintaTashdiqCrudController');
    Route::post('mintatashdiq/{id}/approve', [MintaTashdiqCrudController::class, 'approve']);
    Route::post('mintatashdiq/{id}/decline', [MintaTashdiqCrudController::class, 'decline']);
    Route::get('mintatashdiq/{id}/print', [MintaTashdiqCrudController::class, 'print']);

    Route::crud('izinsakit', 'IzinSakitCrudController');
    Route::post('izinsakit/{id}/approve', [IzinSakitCrudController::class, 'approve']);
    Route::post('izinsakit/{id}/decline', [IzinSakitCrudController::class, 'decline']);
    Route::get('izinsakit/{id}/print', [IzinSakitCrudController::class, 'print']);

    Route::crud('izintawaquf', 'IzinTawaqufCrudController');
    Route::post('izintawaquf/{id}/approve', [IzinTawaqufCrudController::class, 'approve']);
    Route::post('izintawaquf/{id}/decline', [IzinTawaqufCrudController::class, 'decline']);
    Route::get('izintawaquf/{id}/print', [IzinTawaqufCrudController::class, 'print']);

    Route::crud('izinlibur', 'IzinLiburCrudController');
    Route::post('izinlibur/{id}/approve', [IzinLiburCrudController::class, 'approve']);
    Route::post('izinlibur/{id}/decline', [IzinLiburCrudController::class, 'decline']);
    Route::get('izinlibur/{id}/print', [IzinLiburCrudController::class, 'print']);
});// this should be the absolute last line of this file
