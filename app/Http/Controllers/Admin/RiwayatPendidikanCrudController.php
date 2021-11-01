<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RiwayatPendidikanRequest;
use App\Models\Biodata;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RiwayatPendidikanCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RiwayatPendidikanCrudController extends CrudController
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

    public function store()
    {
        $biodata = Biodata::where('user_id', request('biodata_id'))
            ->first();
         $this->crud->getRequest()->request->remove('biodata_id');
         $this->crud->getRequest()->request->add(['biodata_id'=> $biodata->id]);

        return $this->traitStore();
    }

    public function update()
    {
        $biodata = Biodata::where('user_id', request('biodata_id'))
            ->first();
        $this->crud->getRequest()->request->remove('biodata_id');
        $this->crud->getRequest()->request->add(['biodata_id'=> $biodata->id]);

        return $this->traitUpdate();
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\RiwayatPendidikan::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/riwayatpendidikan');
        CRUD::setEntityNameStrings('riwayat pendidikan', 'Riwayat Pendidikan');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('biodata_id')
            ->label('Name')
            ->type('model_function')
            ->function_name('getUserName');
        CRUD::column('rp_jenjang')
            ->label('Jenjang');
        CRUD::column('rp_instansi')
            ->label('Instansi');
        CRUD::column('rp_tempat')
            ->label('Alamat');
        CRUD::column('rp_masuk')
            ->label('Tgl Masuk');
        CRUD::column('rp_keluar')
            ->label('Tgl Keluar');

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
        CRUD::setValidation(RiwayatPendidikanRequest::class);

        CRUD::field('biodata_id')
            ->label('Name')
            ->entity('biodata.user')
            ->model(User::class)
            ->attribute('name')
            ->options(function ($query) {
                return $query->whereHas('biodata')->get();
            })
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('rp_jenjang')
            ->label('Jenjang')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('rp_instansi')
            ->label('Instansi')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('rp_tempat')
            ->label('Alamat')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('rp_masuk')
            ->label('Tgl Masuk')
            ->type('datetime_picker')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('rp_keluar')
            ->label('Tgl Keluar')
            ->type('datetime_picker')
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
        $this->setupCreateOperation();
    }
}
