<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
use App\Http\Controllers\Admin\IzinTinggalCrudController;

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


}); // this should be the absolute last line of this file
