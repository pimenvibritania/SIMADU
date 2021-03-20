<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'role:admin'],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
//    Route::crud('contact', 'ContactCrudController');
}); // this should be the absolute last line of this file
