<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Requests\LegalisirRequest;
use App\Models\Legalisir;
use App\Notifications\LegalisirNotification;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Notification;
use Prologue\Alerts\Facades\Alert;

/**
 * Class LegalisirCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class LegalisirCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Legalisir::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/legalisirs');
        CRUD::setEntityNameStrings('legalisir', 'Legalisir');
        $this->crud->enableExportButtons();

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
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
            'disetujui' => 'Approved',
            'ditolak' => 'Declined',
        ], function($value) { // if the filter is active
            $this->crud->addClause('where', 'status', $value);
        });

        // daterange filter
        $this->crud->addFilter([
            'type'  => 'date_range',
            'name'  => 'from_to',
            'label' => 'Date range'
        ],
            false,
            function ($value) { // if the filter is active, apply these constraints
                $dates = json_decode($value);
                $this->crud->addClause('where', 'created_at', '>=', $dates->from);
                $this->crud->addClause('where', 'created_at', '<=', $dates->to . ' 23:59:59');
            });

        CRUD::column('no_permohonan')->wrapper(
            [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('legalisirs/' . $entry->id . '/show');
                },
                'style' => 'text-decoration:none'
            ]
        );

        CRUD::column('user')->type('relationship')
            ->label('name');

        CRUD::column('img_profile')
            ->type('image')
            ->prefix('uploads/legalisirs/img_docs/');

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
                    } elseif($entry->status == 'disetujui'){
                        return 'btn btn-primary text-white';
                    } else {
                        return 'btn btn-danger text-white';

                    }

                },

                'style' => 'width: 100px'
            ]
        );
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(LegalisirRequest::class);

        CRUD::field('user_id')
            ->label('User')
            ->attributes([
                'id'    => 'userID',
            ])
            ->hint('Pastikan biodata & riwayat pendidikan telah terisi')
            ->options(function ($query) {
                return $query->whereHas('biodata')
                    ->whereHas('biodata.riwayatPendidikan')
                    ->get();
            })
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('email')
            ->attributes([
                'id'    => 'emailUser',
                'disabled' => 'disabled'
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('no_permohonan')
            ->default(Helper::generateId(
                Legalisir::class,
                'no_permohonan',
                strtoupper(substr(
                    backpack_user()->name, 0, 1)) . '/' . request('user_id') ,
                4 ))
            ->attributes([
                'readonly' => 'readonly'
            ])
            ->wrapper([
                'class' => 'form-group col-md-5'
            ]);
        CRUD::field('jml_surat')
            ->label('Jumlah Surat')
            ->type('number')
            ->wrapper([
                'class' => 'form-group col-md-3'
            ]);

        CRUD::field('nama')
            ->label('Nama Dokumen')
            ->wrapper([
                'class' => 'form-group col-md-8'
            ]);

        CRUD::field('img_docs')
            ->label("Scan Dokumen")
            ->type('upload')
            ->upload(true)
            ->hint('Pastikan file berbentuk PDF')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('keperluan')
            ->type('textarea');
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
        $izin = Legalisir::find($id);

        $izin->update([
            'status' => 'disetujui'
        ]);

        return response()->download('uploads/legalisir/'. $izin->img_docs);
    }

    public function approve($id){
        if (request('tgl_ambil') == null){
            Alert::error('Semua field harus diisi')->flash();
            return redirect()->back();
        }
        $kb = Legalisir::find($id);

        $kb->update([
            'tgl_ambil'     => request('tgl_ambil'),
            'status' => 'disetujui'
        ]);

        Notification::send($kb->user,
            new LegalisirNotification($kb));

        Alert::success('Pengajuan legalisir telah di setujui')->flash();
        return redirect('admin/legalisirs');
    }

    public function decline($id){
        $kb = Legalisir::find($id);
        $kb->update([
            'status' => 'ditolak'
        ]);

        Notification::send($kb->user,
            new LegalisirNotification($kb));
    }
}
