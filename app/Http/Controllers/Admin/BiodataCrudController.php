<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BiodataRequest;
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

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Biodata::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/biodata');
        CRUD::setEntityNameStrings('biodata', 'biodatas');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('is_active');
        CRUD::column('user_id');
        CRUD::column('img_profile');
        CRUD::column('img_ktp');
        CRUD::column('no_induk');
        CRUD::column('nama');
        CRUD::column('kelamin');
        CRUD::column('agama');
        CRUD::column('pernikahan');
        CRUD::column('tempat_lahir');
        CRUD::column('tanggal_lahir');
        CRUD::column('tinggi_badan');
        CRUD::column('jenis_vipa_1');
        CRUD::column('no_paspor');
        CRUD::column('jenis_paspor');
        CRUD::column('keluar_paspor');
        CRUD::column('berlaku_paspor_from');
        CRUD::column('berlaku_paspor_to');
        CRUD::column('tiba_mesir');
        CRUD::column('tanggal_lapor');
        CRUD::column('izin_tinggal');
        CRUD::column('pendidikan_akhir');
        CRUD::column('pekerjaan_indo');
        CRUD::column('tujuan_mesir');
        CRUD::column('nama_pasangan');
        CRUD::column('nama_ayah');
        CRUD::column('nama_ibu');
        CRUD::column('alamat_ayah');
        CRUD::column('alamat_ibu');
        CRUD::column('pekerjaan_ayah');
        CRUD::column('pekerjaan_ibu');
        CRUD::column('no_ayah');
        CRUD::column('no_ibu');
        CRUD::column('catatan');
        CRUD::column('alamat_mesir');
        CRUD::column('kota_mesir');
        CRUD::column('provinsi_mesir');
        CRUD::column('no_mesir');
        CRUD::column('alamat_indo');
        CRUD::column('kecamatan_indo');
        CRUD::column('desa_indo');
        CRUD::column('kota_indo');
        CRUD::column('provinsi_indo');
        CRUD::column('pos_indo');
        CRUD::column('no_indo');

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
        CRUD::field('user_id');
        CRUD::field('img_profile');
        CRUD::field('img_ktp');
        CRUD::field('no_induk');
        CRUD::field('nama');
        CRUD::field('kelamin');
        CRUD::field('agama');
        CRUD::field('pernikahan');
        CRUD::field('tempat_lahir');
        CRUD::field('tanggal_lahir');
        CRUD::field('tinggi_badan');
        CRUD::field('jenis_vipa_1');
        CRUD::field('no_paspor');
        CRUD::field('jenis_paspor');
        CRUD::field('keluar_paspor');
        CRUD::field('berlaku_paspor_from');
        CRUD::field('berlaku_paspor_to');
        CRUD::field('tiba_mesir');
        CRUD::field('tanggal_lapor');
        CRUD::field('izin_tinggal');
        CRUD::field('pendidikan_akhir');
        CRUD::field('pekerjaan_indo');
        CRUD::field('tujuan_mesir');
        CRUD::field('nama_pasangan');
        CRUD::field('nama_ayah');
        CRUD::field('nama_ibu');
        CRUD::field('alamat_ayah');
        CRUD::field('alamat_ibu');
        CRUD::field('pekerjaan_ayah');
        CRUD::field('pekerjaan_ibu');
        CRUD::field('no_ayah');
        CRUD::field('no_ibu');
        CRUD::field('catatan');
        CRUD::field('alamat_mesir');
        CRUD::field('kota_mesir');
        CRUD::field('provinsi_mesir');
        CRUD::field('no_mesir');
        CRUD::field('alamat_indo');
        CRUD::field('kecamatan_indo');
        CRUD::field('desa_indo');
        CRUD::field('kota_indo');
        CRUD::field('provinsi_indo');
        CRUD::field('pos_indo');
        CRUD::field('no_indo');

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
        $this->setupCreateOperation();
    }
}
