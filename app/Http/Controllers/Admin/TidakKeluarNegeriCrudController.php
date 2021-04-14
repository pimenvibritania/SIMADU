<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TidakKeluarNegeriRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TidakKeluarNegeriCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TidakKeluarNegeriCrudController extends CrudController
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
        CRUD::setModel(\App\Models\TidakKeluarNegeri::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tidakkeluarnegeri');
        CRUD::setEntityNameStrings('tidakkeluarnegeri', 'tidak_keluar_negeris');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('user_id');
        CRUD::column('no_permohonan');
        CRUD::column('no_surat');
        CRUD::column('tujuan');
        CRUD::column('tempat_tujuan');
        CRUD::column('keperluan');
        CRUD::column('tanda_tangan_id');
        CRUD::column('status');
        CRUD::column('jml_surat');
        CRUD::column('tgl_ambil');
        CRUD::column('created_at');
        CRUD::column('updated_at');

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
        CRUD::setValidation(TidakKeluarNegeriRequest::class);

        CRUD::field('id');
        CRUD::field('user_id');
        CRUD::field('no_permohonan');
        CRUD::field('no_surat');
        CRUD::field('tujuan');
        CRUD::field('tempat_tujuan');
        CRUD::field('keperluan');
        CRUD::field('tanda_tangan_id');
        CRUD::field('status');
        CRUD::field('jml_surat');
        CRUD::field('tgl_ambil');
        CRUD::field('created_at');
        CRUD::field('updated_at');

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
