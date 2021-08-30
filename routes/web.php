<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\IzinTinggalController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::post('mark-notification', [AdminController::class, 'markNotification'])
    ->name('markNotification');

Route::group([
    'prefix' => 'wilayah'
], function (){

    Route::get('provinsi',
        [WilayahController::class, 'provisi'])
        ->name('wilayah.provinsi');

    Route::get('kota/{id}',
        [WilayahController::class, 'kota'])
        ->name('wilayah.kota');

    Route::get('kecamatan/{id}',
        [WilayahController::class, 'kecamatan'])
        ->name('wilayah.kecamatan');

    Route::get('desa/{id}',
        [WilayahController::class, 'desa'])
        ->name('wilayah.desa');

});

Route::resource('biodata', BiodataController::class)
    ->except('index');

Route::group([
    'middleware' => ['web', 'role:user|mahasiswa']
], function (){

    Route::get('pendidikan', [BiodataController::class, 'pendidikanIndex']);

    Route::post('pendidikan/create', [BiodataController::class, 'pendidikan'])->name('pendidikan.create');

});

Route::group([
    'namespace' => 'App\Http\Controllers'
], function (){
    Route::get('login', 'LoginController@showLoginForm')->name('backpack.auth.login');
    Route::post('login', 'LoginController@login');

    Route::get('admin/login', function (){
        return redirect('login');
    });


//    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('backpack.auth.password.reset');
//    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
//    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('backpack.auth.password.email');

    Route::get('logout', 'LoginController@logout')->name('backpack.auth.logout');
    Route::post('logout', 'LoginController@logout');

// Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('backpack.auth.register');
    Route::post('register', 'RegisterController@register');

    Route::get('admin/register', function (){
        return redirect('register');
    });
});

Route::group([
    'middleware' => ['web', 'role:user|mahasiswa|tki'],
    'namespace' => 'App\Http\Controllers'
], function (){

    Route::get('/dashboard', function (){
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('surat/dashboard', function (){
       return view('pages.surat.dashboard');
    })->name('surat.dashboard');

    Route::group([
        'prefix' => 'surat',
        'middleware' => ['web', 'role:tki'],

    ], function (){

        Route::resource('izin-tinggal', 'IzinTinggalController');
        Route::resource('pengampunan', 'PengampunanController');
        Route::resource('alamat-mesir', 'AlamatMesirController');
        Route::resource('alamat-indonesia', 'AlamatIndonesiaController');
        Route::resource('masuk-mesir', 'MasukMesirController');
        Route::resource('visa-umroh', 'VisaUmrohController');
        Route::resource('visa-haji', 'VisaHajiController');
        Route::resource('kepentingan', 'KepentinganController');
        Route::resource('keterangan-lahir', 'KeteranganLahirController');
        Route::resource('tidak-keluar-negeri', 'TidakKeluarNegeriController');


    });

    Route::group([
        'prefix' => 'surat',
        'middleware' => ['web', 'role:mahasiswa'],

    ], function (){

        Route::resource('keterangan-belajar', 'KeteranganBelajarController');
        Route::resource('pindah-kuliah-indonesia', 'PindahKuliahIndonesiaController');
        Route::resource('pindah-kuliah-luar-negeri', 'PindahKuliahLuarNegeriController');
        Route::resource('custom-letter', 'CustomLetterController');
        Route::resource('masuk-kuliah', 'MasukKuliahController');
        Route::resource('kuliah-iftha', 'KuliahIfthaController');
        Route::resource('masuk-mahad', 'MasukMahadController');
        Route::resource('ket-non-beasiswa', 'KetNonBeasiswaController');
        Route::resource('pindah-fakultas', 'PindahFakultasController');
        Route::resource('masuk-ruak', 'MasukRuakController');
        Route::resource('cuti-kuliah', 'CutiKuliahController');
        Route::resource('daftar-nilai', 'DaftarNilaiController');
        Route::resource('minta-tashdiq', 'MintaTashdiqController');
        Route::resource('cabut-berkas', 'CabutBerkasController');
        Route::resource('keringanan-biaya', 'KeringananBiayaController');
        Route::resource('izin-sakit', 'IzinSakitController');
        Route::resource('izin-tawaquf', 'IzinTawaqufController');
        Route::resource('izin-libur', 'IzinLiburController');

    });

    Route::group([
        'prefix' => 'surat'
    ], function (){
        Route::resource('legalisir', 'LegalisirController');
        Route::resource('akta-lahir', 'AktaLahirController');
    });
});

//admin route
Route::group(
    [
        'prefix' => config('backpack.base.route_prefix', 'admin'),
        'middleware' => ['web', 'role:admin'],
        'namespace'  => 'App\Http\Controllers\Admin'

    ],
    function () {
        Route::crud('permission', 'PermissionCrudController');
        Route::crud('role', 'RoleCrudController');
        Route::crud('user', 'UserCrudController');
        Route::get('dashboard', 'AdminController@dashboard')->name('backpack.dashboard');
        Route::get('/', 'AdminController@redirect')->name('backpack');
        Route::get('edit-account-info', 'MyAccountController@getAccountInfoForm')->name('backpack.account.info');
        Route::post('edit-account-info', 'MyAccountController@postAccountInfoForm')->name('backpack.account.info.store');
        Route::post('change-password', 'MyAccountController@postChangePasswordForm')->name('backpack.account.password');

    }
);

