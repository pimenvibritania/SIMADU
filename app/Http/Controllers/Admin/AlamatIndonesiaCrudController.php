<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Requests\AlamatIndonesiaRequest;
use App\Models\AlamatIndonesia;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use PhpOffice\PhpWord\TemplateProcessor;
use Prologue\Alerts\Facades\Alert;

/**
 * Class AlamatIndonesiaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class AlamatIndonesiaCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    use CreateOperation {
        store as traitStore;
    }
    use DeleteOperation {
        destroy as traitDestroy;
    }
    use UpdateOperation {
        update as traitUpdate;
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(AlamatIndonesia::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/alamatindonesia');
        CRUD::setEntityNameStrings('alamat-indonesia', 'Keterangan Alamat Indonesia');
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

        CRUD::column('no_surat')->wrapper(
            [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('alamatindonesia/' . $entry->id . '/show');
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
                    } elseif($entry->status == 'disetujui'){
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
        CRUD::setValidation(AlamatIndonesiaRequest::class);

        CRUD::field('no_surat')
            ->default(Helper::generateId(
                AlamatIndonesia::class,
                'no_surat',
                'K/AI',
                4 ))
            ->attributes([
                'readonly' => 'readonly'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('no_permohonan')
            ->default(Helper::generateId(
                AlamatIndonesia::class,
                'no_permohonan',
                strtoupper(substr(
                   backpack_user()->name, 0, 1)) . '/' . request('user_id') ,
                4 ))
            ->attributes([
                'readonly' => 'readonly'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

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
        CRUD::field('jml_surat')
            ->label('Jumlah Surat')
            ->type('number')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('tujuan');
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
        $izin = AlamatIndonesia::find($id);

        $template = new TemplateProcessor('word-template/K-alamat-indonesia.docx');
        $template->setValues([
            'no_surat' => $izin->no_surat,
            'nama'  => $izin->user->name,
            'nama_arab' => $izin->user->biodata->nama,
            'no_paspor' => $izin->user->biodata->no_paspor,
            'pekerjaan' => $izin->user->biodata->pekerjaan,
            'alamat_indo' => $izin->user->biodata->alamat_indo,
            'provinsi_indo' => $izin->user->biodata->provinsi_indo,
            'kota_indo' => $izin->user->biodata->kota_indo,
            'kec_indo' => $izin->user->biodata->kecamatan_indo,
            'desa_indo' => $izin->user->biodata->desa_indo,
            'kode_pos' => $izin->user->biodata->pos_indo,
            'tgl_verif' => now()->isoFormat('dddd, D MMMM Y'),
            'ttd_nama' => $izin->tandaTangan->nama,
            'ttd_jabatan' => $izin->tandaTangan->jabatan,

        ]);

        $filename = 'alamat-indonesia_' . $izin->user->name;
        $template->saveAs($filename . '.docx' );

        $izin->update([
            'status' => 'disetujui'
        ]);

        return response()->download($filename . '.docx', '')
            ->deleteFileAfterSend(true);
    }

    public function approve($id){

        if ((\request('tanda_tangan_id') == null) ||
            (\request('tgl_ambil') == null)){
            Alert::error('Semua field harus diisi')->flash();
            return redirect()->back();
        }

        AlamatIndonesia::find($id)->update([
            'tanda_tangan_id' => request('tanda_tangan_id'),
            'tgl_ambil'     => request('tgl_ambil'),
            'status' => 'disetujui'
        ]);

        Alert::success('Surat keterangan alamat telah di setujui')->flash();
        return redirect('admin/alamatindonesia');
    }

    public function decline($id){
        AlamatIndonesia::find($id)->update([
            'status' => 'ditolak'
        ]);
    }
}
