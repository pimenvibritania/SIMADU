<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\IzinTinggalController;
use App\Http\Controllers\JurusanController;
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

    Route::get('mesir_prov',
        [WilayahController::class, 'mesirProv'])
        ->name('wilayah.mesir_prov');

    Route::get('mesir_city/{id}',
        [WilayahController::class, 'mesirCity'])
        ->name('wilayah.mesir_city');

});
Route::group([
    'prefix' => 'jenjang'
], function () {
    Route::get('/', [JurusanController::class, 'jenjang'])
        ->name('jenjang.all');
    Route::get('fakultas', [JurusanController::class, 'fakultas'])
        ->name('fakultas.all');
    Route::post('jurusan', [JurusanController::class, 'jurusan'])
        ->name('jurusan.all');
});


//Route::resource('biodata', BiodataController::class)
//    ->except(['index', 'edit', 'update']);
Route::group([
    'middleware' => ['web','auth', 'verified']
], function (){

    Route::get('biodata/create', [BiodataController::class, 'create'])->name('biodata.create');
    Route::post('biodata/store', [BiodataController::class, 'store'])->name('biodata.store');
    Route::get('biodata', [BiodataController::class, 'show'])->name('biodata.show');
    Route::get('biodata/edit', [BiodataController::class, 'edit'])->name('biodata.edit');
    Route::post('biodata/update', [BiodataController::class, 'update'])->name('biodata.update');

});
Route::group([
    'middleware' => ['web', 'role:user|mahasiswa']
], function (){

    Route::get('pendidikan', [BiodataController::class, 'pendidikanIndex'])->name('pendidikan.fill');
    Route::post('pendidikan/create', [BiodataController::class, 'pendidikan'])->name('pendidikan.create');
    Route::get('pendidikan/add', [BiodataController::class, 'pendidikanAdd'])->name('pendidikan.add');

});

Route::get('verify-email', [EmailVerificationController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice');

Route::post('/verify-email/request', [EmailVerificationController::class, 'request'])
    ->middleware('auth')
    ->name('verification.request');

Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth'])
    ->name('verification.verify');

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
    'middleware' => ['web', 'verified', 'role:user|mahasiswa|tki'],
    'namespace' => 'App\Http\Controllers'
], function (){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group([
        'prefix' => 'surat',
        'middleware' => ['web', 'admin.verified', 'role:tki|mahasiswa'],

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
        'middleware' => ['web', 'admin.verified','role:mahasiswa'],

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
        'middleware' => ['admin.verified'],
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
        'middleware' => ['web', 'role:admin|admin_konsuler|admin_mahasiswa|pimpinan'],
        'namespace'  => 'App\Http\Controllers\Admin'

    ],
    function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('backpack.dashboard');
        Route::get('/', 'AdminController@redirect')->name('backpack');
        Route::get('edit-account-info', 'MyAccountController@getAccountInfoForm')->name('backpack.account.info');
        Route::post('edit-account-info', 'MyAccountController@postAccountInfoForm')->name('backpack.account.info.store');
        Route::post('change-password', 'MyAccountController@postChangePasswordForm')->name('backpack.account.password');

    }
);
Route::group(
    [
        'prefix' => config('backpack.base.route_prefix', 'admin'),
        'middleware' => ['web', 'role:admin'],
        'namespace'  => 'App\Http\Controllers\Admin'

    ],
    function () {
        Route::crud('user', 'UserCrudController');
    });



