<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MasterBasRequest;
use App\Http\Requests\MasterPnbpRequest;
use App\Models\MasterBas;
use App\Models\MasterPnbp;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MasterPnbpCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MasterPnbpCrudController extends CrudController
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
        CRUD::setModel(\App\Models\MasterPnbp::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/master-pnbp');
        CRUD::setEntityNameStrings('master-pnbp', 'Master PNBP');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('kode');
        CRUD::column('master_bas_id');

        CRUD::column('is_active');
        CRUD::column('jenis');
        CRUD::column('biaya')->prefix("$");

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
        CRUD::setValidation(MasterPnbpRequest::class);

        CRUD::field('kode');
        CRUD::field('master_bas_id')
            ->type('select')
            ->entity('masterBas')
            ->model(MasterBas::class)
            ->attribute('akuntansi');

        CRUD::field('is_active');
        CRUD::field('jenis');
        CRUD::field('biaya')
            ->type("number")
            ->prefix("$");

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

    public function ajax(){
        $jenis = request('jenis');
        $res = MasterPnbp::where('jenis', $jenis)->first();
        return response()->json([
            'kode' => $res->kode,
            'jenis' => $res->jenis,
            'biaya' => $res->biaya
        ]);
    }
}
