<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
use App\Http\Controllers\Admin\AlamatIndonesiaCrudController;
use App\Http\Controllers\Admin\AlamatMesirCrudController;
use App\Http\Controllers\Admin\IzinTinggalCrudController;
use App\Http\Controllers\Admin\KepentinganCrudController;
use App\Http\Controllers\Admin\KeteranganLahirCrudController;
use App\Http\Controllers\Admin\MasukMesirCrudController;
use App\Http\Controllers\Admin\PengampunanCrudController;
use App\Http\Controllers\Admin\TidakKeluarNegeriCrudController;
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

    Route::crud('alamat-indonesia', 'AlamatIndonesiaCrudController');
    Route::post('alamat-indonesia/{id}/approve', [AlamatIndonesiaCrudController::class, 'approve']);
    Route::post('alamat-indonesia/{id}/decline', [AlamatIndonesiaCrudController::class, 'decline']);
    Route::get('alamat-indonesia/{id}/print', [AlamatIndonesiaCrudController::class, 'print']);

    Route::crud('tidak-keluar-negeri', 'TidakKeluarNegeriCrudController');
    Route::post('tidak-keluar-negeri/{id}/approve', [TidakKeluarNegeriCrudController::class, 'approve']);
    Route::post('tidak-keluar-negeri/{id}/decline', [TidakKeluarNegeriCrudController::class, 'decline']);
    Route::get('tidak-keluar-negeri/{id}/print', [TidakKeluarNegeriCrudController::class, 'print']);

    Route::crud('kepentingan', 'KepentinganCrudController');
    Route::post('kepentingan/{id}/approve', [KepentinganCrudController::class, 'approve']);
    Route::post('kepentingan/{id}/decline', [KepentinganCrudController::class, 'decline']);
    Route::get('kepentingan/{id}/print', [KepentinganCrudController::class, 'print']);

    Route::crud('keterangan-lahir', 'KeteranganLahirCrudController');
    Route::post('keterangan-lahir/{id}/approve', [KeteranganLahirCrudController::class, 'approve']);
    Route::post('keterangan-lahir/{id}/decline', [KeteranganLahirCrudController::class, 'decline']);
    Route::get('keterangan-lahir/{id}/print', [KeteranganLahirCrudController::class, 'print']);

}); // this should be the absolute last line of this file
