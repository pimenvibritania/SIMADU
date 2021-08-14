<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TidakKeluarNegeriRequest;
use App\Models\TidakKeluarNegeri;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use PhpOffice\PhpWord\TemplateProcessor;
use Prologue\Alerts\Facades\Alert;

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
        CRUD::setModel(\App\Models\TidakKeluarNegeri::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tidak-keluar-negeri');
        CRUD::setEntityNameStrings('tidak-keluar-negeri', 'Tidak Keluar Negeri');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->removeButton('create');
        $this->crud->removeButton('delete');
        $this->crud->removeButton('update');
        $this->crud->removeButton('show');

        $this->crud->addButtonFromView('line', 'approve', 'approve', 'end');

        $this->crud->addFilter([
            'name'  => 'status',
            'type'  => 'dropdown',
            'label' => 'Status'
        ], [
            'new' => 'New',
            'approved' => 'Approved',
            'declined' => 'Declined',
        ], function($value) { // if the filter is active
            $this->crud->addClause('where', 'status', $value);
        });

        CRUD::column('no_surat')->wrapper(
            [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('tidak-keluar-negeri/' . $entry->id . '/show');
                },
                'style' => 'text-decoration:none'
            ]
        );

        CRUD::column('user')->type('relationship')
            ->label('name');

        CRUD::column('created_at')
            ->type('date')
            ->label('diajukan');

        CRUD::column('tgl_ambil')
            ->type('date')
            ->label('diambil');

        CRUD::column('jml_surat')
            ->label('jumlah');

        CRUD::column('status')->wrapper(
            [
                'class' => function ($crud, $column, $entry, $related_key) {
                    if ($entry->status == 'new'){
                        return 'btn btn-success text-white';
                    } elseif($entry->status == 'approved'){
                        return 'btn btn-primary text-white';
                    } else {
                        return 'btn btn-danger text-white';

                    }

                },

                'style' => 'width: 100px'
            ]
        );

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

    public function print($id){
        $izin = TidakKeluarNegeri::find($id);

        $template = new TemplateProcessor(
            'word-template/K-tidak-keluar-negeri.docx');
        $template->setValues([
            'no_surat' => $izin->no_surat,
            'nama'  => $izin->user->name,
            'nama_arab' => $izin->user->biodata->nama,
            'no_paspor' => $izin->user->biodata->no_paspor,
            'tujuan' => $izin->tujuan,
            'tempat_tujuan' => $izin->tempat_tujuan,
            'tgl_verif' => now()->isoFormat('dddd, D MMMM Y'),
            'tahun' => now()->isoFormat('Y'),
            'ttd_nama' => $izin->tandaTangan->nama,
            'ttd_jabatan' => $izin->tandaTangan->jabatan,

        ]);

        $filename = 'tidak-keluar-negeri_' . $izin->user->name;
        $template->saveAs($filename . '.docx' );

        $izin->update([
            'status' => 'approved'
        ]);

        return response()->download($filename . '.docx', '')
            ->deleteFileAfterSend(true);
    }

    public function approve($id){

        TidakKeluarNegeri::find($id)->update([
            'tanda_tangan_id' => request('tanda_tangan_id'),
            'tgl_ambil'     => request('tgl_ambil'),
            'status' => 'approved'
        ]);

        Alert::success('Surat izin telah di setujui')->flash();
        return redirect('admin/tidak-keluar-negeri');
    }

    public function decline($id){
        TidakKeluarNegeri::find($id)->update([
            'status' => 'declined'
        ]);
    }
}
