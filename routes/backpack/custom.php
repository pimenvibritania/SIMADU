<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
use App\Http\Controllers\Admin\AlamatMesirCrudController;
use App\Http\Controllers\Admin\IzinTinggalCrudController;
use App\Http\Controllers\Admin\MasukMesirCrudController;
use App\Http\Controllers\Admin\PengampunanCrudController;
use App\Http\Controllers\Admin\VisaHajiCrudController;
use App\Http\Controllers\Admin\VisaUmrohCrudController;
use App\Http\Controllers\MasukMesirController;

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'role:admin'],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
//    Route::crud('contact', 'ContactCrudController');
    Route::crud('biodata', 'BiodataCrudController');

    Route::crud('izin-tinggal', 'IzinTinggalCrudController');
    Route::post('izin-tinggal/{id}/approve', [IzinTinggalCrudController::class, 'approve']);
    Route::post('izin-tinggal/{id}/decline', [IzinTinggalCrudController::class, 'decline']);
    Route::get('izin-tinggal/{id}/print', [IzinTinggalCrudController::class, 'print']);

    Route::crud('pendidikanmesir', 'PendidikanMesirCrudController');

    Route::crud('pengampunan', 'PengampunanCrudController');
    Route::post('pengampunan/{id}/approve', [PengampunanCrudController::class, 'approve']);
    Route::post('pengampunan/{id}/decline', [PengampunanCrudController::class, 'decline']);
    Route::get('pengampunan/{id}/print', [PengampunanCrudController::class, 'print']);

    Route::crud('alamat-mesir', 'AlamatMesirCrudController');
    Route::post('alamat-mesir/{id}/approve', [AlamatMesirCrudController::class, 'approve']);
    Route::post('alamat-mesir/{id}/decline', [AlamatMesirCrudController::class, 'decline']);
    Route::get('alamat-mesir/{id}/print', [AlamatMesirCrudController::class, 'print']);

    Route::crud('masuk-mesir', 'MasukMesirCrudController');
    Route::post('masuk-mesir/{id}/approve', [MasukMesirCrudController::class, 'approve']);
    Route::post('masuk-mesir/{id}/decline', [MasukMesirCrudController::class, 'decline']);
    Route::get('masuk-mesir/{id}/print', [MasukMesirCrudController::class, 'print']);

    Route::crud('visa-haji', 'VisaHajiCrudController');
    Route::post('visa-haji/{id}/approve', [VisaHajiCrudController::class, 'approve']);
    Route::post('visa-haji/{id}/decline', [VisaHajiCrudController::class, 'decline']);
    Route::get('visa-haji/{id}/print', [VisaHajiCrudController::class, 'print']);

    Route::crud('visa-umroh', 'VisaUmrohCrudController');
    Route::post('visa-umroh/{id}/approve', [VisaUmrohCrudController::class, 'approve']);
    Route::post('visa-umroh/{id}/decline', [VisaUmrohCrudController::class, 'decline']);
    Route::get('visa-umroh/{id}/print', [VisaUmrohCrudController::class, 'print']);

    Route::crud('riwayatpendidikan', 'RiwayatPendidikanCrudController');
    Route::crud('tandatangan', 'TandaTanganCrudController');
    Route::crud('alamatmesir', 'AlamatMesirCrudController');
    Route::crud('izintinggal', 'IzinTinggalCrudController');
    Route::crud('masukmesir', 'MasukMesirCrudController');

    Route::crud('alamatindonesia', 'AlamatIndonesiaCrudController');
    Route::crud('visahaji', 'VisaHajiCrudController');
    Route::crud('visaumroh', 'VisaUmrohCrudController');
    Route::crud('kepentingan', 'KepentinganCrudController');
    Route::crud('keteranganlahir', 'KeteranganLahirCrudController');
    Route::crud('tidakkeluarnegeri', 'TidakKeluarNegeriCrudController');
}); // this should be the absolute last line of this file