<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BiodataRequest;
use App\Models\Agama;
use App\Models\Institute;
use App\Models\JenisPaspor;
use App\Models\Mahasiswa\Fakultas;
use App\Models\MasterLevel;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BiodataCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BiodataCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation {
        destroy as traitDestroy;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Biodata::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/biodata');
        CRUD::setEntityNameStrings('biodata', 'Biodata');
    }

    public function store()
    {
        $this->crud->addField(['type' => 'hidden', 'name' => 'verified_date']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'verified_by']);

        $this->crud->getRequest()->request->add([
            'verified_date'=> date('Y-m-d H:i:s'),
            'verified_by' => backpack_user()->name
        ]);

        return $this->traitStore();
    }

    public function update()
    {
        $http = preg_split('/:\/\//',url('/'));
        $regexURi = $http[0] . ":\/\/" . $http[1] . "\/uploads\/biodata\/";

        $ktp = request('img_ktp');
        $profile = request('img_profile');
        $akta = request('img_akte');
        $paspor = request('img_paspor');
        $ijazah = request('img_ijazah');

        $replacedKtp  = preg_replace("/".$regexURi . "img_ktp\//", '', $ktp);
        $replacedProfile  = preg_replace("/".$regexURi . "img_profile\//", '', $profile);
        $replacedAkte  = preg_replace("/".$regexURi . "img_akte\//", '', $akta);
        $replacedPaspor  = preg_replace("/".$regexURi . "img_paspor\//", '', $paspor);
        $replacedIjazah  = preg_replace("/".$regexURi . "img_ijazah\//", '', $ijazah);

        $this->crud->getRequest()->request->remove('img_ktp');
        $this->crud->getRequest()->request->remove('img_profile');
        $this->crud->getRequest()->request->remove('img_akte');
        $this->crud->getRequest()->request->remove('img_paspor');
        $this->crud->getRequest()->request->remove('img_ijazah');

        $this->crud->getRequest()->request->add(['img_ktp'=> $replacedKtp]);
        $this->crud->getRequest()->request->add(['img_profile'=> $replacedProfile]);
        $this->crud->getRequest()->request->add(['img_akte'=> $replacedAkte]);
        $this->crud->getRequest()->request->add(['img_paspor'=> $replacedPaspor]);
        $this->crud->getRequest()->request->add(['img_ijazah'=> $replacedIjazah]);

        return $this->traitUpdate();
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addClause('where', 'verified_date', '!=', 'NULL');
        CRUD::column('noreg');
        CRUD::column('nama');
        CRUD::column('img_profile')
            ->type('image')
            ->prefix('uploads/biodata/img_profile/');
        CRUD::column('kelamin');
        CRUD::column('tanggal_lahir');
        CRUD::column('no_paspor');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(BiodataRequest::class);

        CRUD::field('is_active');

        CRUD::field('user_id')
            ->type('select')
            ->options(function ($query) {
                return $query->doesntHave('biodata')->get();
            })
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('noreg')
            ->label("Nomor Registrasi")
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('nip')
            ->label("Nomor Induk Pelajar (NIP)")
            ->default("-")
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('niw')
            ->label("Nomor Induk WNI - non Pelajar (NIW)")
            ->default("-")
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('nama')->label('Nama Arab');

        CRUD::field('img_profile')
            ->label('Foto Profil')
            ->type('image')
            ->prefix('uploads/biodata/img_profile/')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('img_ktp')
            ->label("Foto KTP")
            ->type('image')
            ->prefix('uploads/biodata/img_ktp/')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('img_akte')
            ->label("Foto Akta Lahir")
            ->type('image')
            ->prefix('uploads/biodata/img_akte/')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('img_paspor')
            ->label("Foto Paspor")
            ->type('image')
            ->prefix('uploads/biodata/img_paspor/')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('img_ijazah')
            ->label("Foto Ijazah")
            ->type('image')
            ->prefix('uploads/biodata/img_ijazah/')
            ->wrapper([
                'class' => 'form-group col-md-12'
            ]);

        CRUD::field('kelamin')
            ->type('select2_from_array')
            ->options([
                'lakilaki'   => 'Laki-laki',
                'perempuan'    => "Perempuan",
                'lainnya'   => "Lainnya"
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('agama')
            ->type('select2_from_array')
            ->options(
                (function() {
                    $agama = Agama::all();
                    $listAgama = [];
                    foreach ($agama as $value) {
                        array_push($listAgama, $value->nama);
                    }

                    return $listAgama;
                })()
            )
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);


        CRUD::field('pernikahan')
            ->type('select2_from_array')
            ->options([
                'menikah'   => 'Menikah',
                'lajang'    => "Lajang",
                'cerai'     => "Cerai",
                'lainnya'   => "Lainnya"
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('tempat_lahir')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('tanggal_lahir')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('tinggi_badan')
            ->type('number')
            ->suffix('CM')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('jenis_vipa_1')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('no_paspor')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('jenis_paspor')
            ->type('select_from_array')
            ->allow_null(false)
            ->options((function() {
                $jenisPaspor = JenisPaspor::all()->toArray();

                $res = [];
                foreach ($jenisPaspor as $key => $value ) {
                    $res[$value['nama']] = $value['nama'];
                }

                return $res;
            })())
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('keluar_paspor')
            ->label("Tanggal keluar paspor")
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('berlaku_paspor_from')
            ->label('Berlaku paspor sejak')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('berlaku_paspor_to')
            ->label('Berlaku paspor sampai')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('dikeluarkan_oleh')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('tiba_mesir')
            ->label('Tanggal tiba di Mesir')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('tanggal_lapor')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('pendidikan_akhir')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('pekerjaan_indo')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('tujuan_mesir')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_pasangan')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_ayah')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_ibu')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('alamat_ayah')
            ->type('textarea')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('alamat_ibu')
            ->type('textarea')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('pekerjaan_ayah')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('pekerjaan_ibu')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('no_ayah')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('no_ibu')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('catatan')
            ->type('textarea');

        CRUD::field('provinsi_indo')
            ->label('Provinsi di Indonesia')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'prov_indo'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('kota_indo')
            ->label('Kota di Indonesia')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'kota_indo',
                'disabled'  => 'disabled'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('kecamatan_indo')
            ->label('Kecamatan di Indonesia')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'kec_indo',
                'disabled'  => 'disabled'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('desa_indo')
            ->label('Desa di Indonesia')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'desa_indo',
                'disabled'  => 'disabled'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('alamat_indo')
            ->type('textarea');

        CRUD::field('pos_indo')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('no_indo')
            ->label('No telepon Indonesia')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('provinsi_mesir')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'prov_mesir'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('kota_mesir')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'kota_mesir',
                'disabled'  => 'disabled'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('alamat_mesir')
            ->type('textarea')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('no_mesir')
            ->label('No telepon Mesir')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('nama_mediator')
            ->label('Nama Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('kontak_mediator')
            ->label('No Kontak Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('nama_mitra_mediator')
            ->label('Nama Mitra Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('kontak_mitra_mediator')
            ->label('No Kontak Mitra Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('thn_masuk_s1')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('thn_lulus_s1')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('thn_masuk_s2')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('thn_lulus_s2')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('thn_masuk_s3')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('thn_lulus_s3')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('institute_id')
            ->type('select2')
            ->entity('institute')
            ->model(Institute::class)
            ->attribute('name_en')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('fakultas_id')
            ->type('select2')
            ->entity('fakultas')
            ->model(Fakultas::class)
            ->attribute('name_en')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('master_level_id')
            ->label('Tingkat')
            ->type('select2')
            ->entity('tingkat')
            ->model(MasterLevel::class)
            ->attribute('tingkat')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('jenjang_id')
            ->type('select2')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::field('is_active');
        CRUD::field('user_id')
            ->type('select')
            ->options(function ($query) {
                return $query->doesntHave('biodata')->get();
            })
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('noreg')
            ->label('Nomor Registrasi')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama')->label('Nama Arab');

        CRUD::field('img_profile')
            ->label('Foto Profil')
            ->type('image')
            ->prefix('uploads/biodata/img_profile/')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('img_ktp')
            ->label("Foto KTP")
            ->type('image')
            ->prefix('uploads/biodata/img_ktp/')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('img_akte')
            ->label("Foto Akta Lahir")
            ->type('image')
            ->prefix('uploads/biodata/img_akte/')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('img_paspor')
            ->label("Foto Paspor")
            ->type('image')
            ->prefix('uploads/biodata/img_paspor/')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('img_ijazah')
            ->label("Foto Ijazah")
            ->type('image')
            ->prefix('uploads/biodata/img_ijazah/')
            ->wrapper([
                'class' => 'form-group col-md-12'
            ]);

        CRUD::field('kelamin')
            ->type('select2_from_array')
            ->options([
                'lakilaki'   => 'Laki-laki',
                'perempuan'    => "Perempuan",
                'lainnya'   => "Lainnya"
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('agama')
            ->type('select2_from_array')
            ->options(
                (function() {
                    $agama = Agama::all();
                    $listAgama = [];
                    foreach ($agama as $value) {
                        array_push($listAgama, $value->nama);
                    }

                    return $listAgama;
                })()
            )
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);


        CRUD::field('pernikahan')
            ->type('select2_from_array')
            ->options([
                'menikah'   => 'Menikah',
                'lajang'    => "Lajang",
                'cerai'     => "Cerai",
                'lainnya'   => "Lainnya"
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('tempat_lahir')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('tanggal_lahir')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('tinggi_badan')
            ->type('number')
            ->suffix('CM')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('jenis_vipa_1')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('no_paspor')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('jenis_paspor')
            ->type('select_from_array')
            ->allow_null(false)
            ->options((function() {
                $jenisPaspor = JenisPaspor::all()->toArray();

                $res = [];
                foreach ($jenisPaspor as $key => $value ) {
                    $res[$value['nama']] = $value['nama'];
                }

                return $res;
            })())
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('keluar_paspor')
            ->label("Tanggal keluar paspor")
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('berlaku_paspor_from')
            ->label('Berlaku paspor sejak')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('berlaku_paspor_to')
            ->label('Berlaku paspor sampai')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('dikeluarkan_oleh')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('tiba_mesir')
            ->label('Tanggal tiba di Mesir')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('tanggal_lapor')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('pendidikan_akhir')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('pekerjaan_indo')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('tujuan_mesir')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_pasangan')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_ayah')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_ibu')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('alamat_ayah')
            ->type('textarea')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('alamat_ibu')
            ->type('textarea')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('pekerjaan_ayah')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('pekerjaan_ibu')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('no_ayah')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('no_ibu')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('catatan')
            ->type('textarea');

        CRUD::field('provinsi_indo')
            ->label('Provinsi di Indonesia')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'prov_indo'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('kota_indo')
            ->label('Kota di Indonesia')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'kota_indo',
                'disabled'  => 'disabled'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('kecamatan_indo')
            ->label('Kecamatan di Indonesia')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'kec_indo',
                'disabled'  => 'disabled'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('desa_indo')
            ->label('Desa di Indonesia')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'desa_indo',
                'disabled'  => 'disabled'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('alamat_indo')
            ->type('textarea');

        CRUD::field('pos_indo')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('no_indo')
            ->label('No telepon Indonesia')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('provinsi_mesir')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'prov_mesir'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('kota_mesir')
            ->type('select2_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'kota_mesir',
                'disabled'  => 'disabled'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('alamat_mesir')
            ->type('textarea')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('no_mesir')
            ->label('No telepon Mesir')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('nama_mediator')
            ->label('Nama Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('kontak_mediator')
            ->label('No Kontak Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_mitra_mediator')
            ->label('Nama Mitra Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('kontak_mitra_mediator')
            ->label('No Kontak Mitra Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_mediator')
            ->label('Nama Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('kontak_mediator')
            ->label('No Kontak Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('nama_mitra_mediator')
            ->label('Nama Mitra Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('kontak_mitra_mediator')
            ->label('No Kontak Mitra Mediator')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('thn_masuk_s1')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('thn_lulus_s1')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('thn_masuk_s2')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('thn_lulus_s2')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('thn_masuk_s3')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('thn_lulus_s3')
            ->type('date')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('institute_id')
            ->type('select2')
            ->entity('institute')
            ->model(Institute::class)
            ->attribute('name_en')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('fakultas_id')
            ->type('select2')
            ->entity('fakultas')
            ->model(Fakultas::class)
            ->attribute('name_en')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('master_level_id')
            ->label('Tingkat')
            ->type('select2')
            ->entity('tingkat')
            ->model(MasterLevel::class)
            ->attribute('tingkat')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('jenjang_id')
            ->type('select2')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
    }

    public function ajax()
    {
        $user = User::find(request('userID'));

        return $user->email;
    }
}
