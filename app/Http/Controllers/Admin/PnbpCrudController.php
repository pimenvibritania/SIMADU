<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PnbpRequest;
use App\Models\MasterPnbp;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PnbpCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PnbpCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation {
        destroy as traitDestroy;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }

    public function store(){


        $this->crud->getRequest()->request->add([
            'kode_pnbp' => request('kode_pnbp'),
            'biaya' => request('biaya'),
            'jenis_pnbp' => request('jenis_pnbp')
        ]);
        $this->crud->addField(['type' => 'hidden', 'name' => 'kode_pnbp']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'biaya']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'jenis_pnbp']);

        $response = $this->traitStore();

        return $response;
    }

    public function update()
    {

        $this->crud->getRequest()->request->add([
            'kode_pnbp' => request('kode_pnbp'),
            'biaya' => request('biaya'),
            'jenis_pnbp' => request('jenis_pnbp')
        ]);
        $this->crud->addField(['type' => 'hidden', 'name' => 'kode_pnbp']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'biaya']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'jenis_pnbp']);

        $response = $this->traitUpdate();

        return $response;
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Pnbp::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pnbp');
        CRUD::setEntityNameStrings('pnbp', 'PNBP');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
//        CRUD::column('master_pnbp_id');
        CRUD::column('kode_pnbp');
        CRUD::column('nama_pemohon');
        CRUD::column('jenis_pnbp');
        CRUD::column('tanggal');
        CRUD::column('biaya')
            ->prefix("$");
        CRUD::column('keterangan');

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
        CRUD::setValidation(PnbpRequest::class);
        CRUD::field('nama_pemohon');
        CRUD::field('tanggal');
        CRUD::field('master_pnbp_id')
            ->label('Kode PNBP')
            ->type('select2')
            ->entity('masterPnbp')
            ->model(MasterPnbp::class)
            ->attribute('kode')
            ->wrapper([
                'id' => 'kodePnbp',
            ]);
//        CRUD::field('kode_pnbp');
//        CRUD::field('biaya');
        CRUD::field('keterangan');

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
