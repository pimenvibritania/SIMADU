<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ChangableWordRequest;
use App\Models\ChangableWord;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ChangableWordCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ChangableWordCrudController extends CrudController
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
        CRUD::setModel(\App\Models\ChangableWord::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/changableword');
        CRUD::setEntityNameStrings('Template Surat', 'changable_words');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('judul');
        CRUD::column('deskripsi');
        CRUD::column('type');
        CRUD::column('is_active');

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
        CRUD::setValidation(ChangableWordRequest::class);

        CRUD::field('judul')
            ->hint('* Contoh : "Masuk Kuliah - Tujuan"');
        CRUD::field('type')
            ->type('select2_from_array')
            ->options([
                'tujuan' => 'Tujuan',
                'keterangan' => 'Keterangan'
            ]);
        CRUD::field('deskripsi')
            ->label('Deskripsi Keterangan')
            ->hint('
                * Contoh Type Tujuan : "السيد / مدير عام الإدارة العامة للطلاب الوافدين الأزهر الشريف بالقاهرة"
                <br>
                * Contoh Type Keterangan: "يرغب في الالتحاق بالدراسات العليا............ا"
                ');

        CRUD::field('is_active');

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

    public function ajax($id){

        return response()->json([
            'response' => ChangableWord::find($id)
        ]);
    }

    public function kb($id){
        return response()->json([
            'response' => ChangableWord::where('type', 'tujuan')->get()
        ]);
    }
}
