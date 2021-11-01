<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Requests\KetNonBeasiswaRequest;
use App\Models\Mahasiswa\KetNonBeasiswa;
use App\Notifications\KetNonBeasiswaNotification;
use App\Notifications\MasukKuliahNotification;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Notification;
use PhpOffice\PhpWord\TemplateProcessor;
use Prologue\Alerts\Facades\Alert;

/**
 * Class KetNonBeasiswaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class KetNonBeasiswaCrudController extends CrudController
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

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Mahasiswa\KetNonBeasiswa::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/ketnonbeasiswa');
        CRUD::setEntityNameStrings('ketnonbeasiswa', 'Keterangan Tidak Menerima Beasiswa');
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
                    return backpack_url('ketnonbeasiswa/' . $entry->id . '/show');
                },
                'style' => 'text-decoration:none'
            ]
        );

        CRUD::column('user')->type('relationship')
            ->label('name');

        CRUD::column('thn_ajaran')
            ->label('tahun ajaran');

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
        CRUD::setValidation(KetNonBeasiswaRequest::class);
        CRUD::field('no_surat')
            ->default(Helper::generateId(
                KetNonBeasiswa::class,
                'no_surat',
                'M/KNB',
                4 ))
            ->attributes([
                'readonly' => 'readonly'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('no_permohonan')
            ->default(Helper::generateId(
                KetNonBeasiswa::class,
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
            ->hint('Pastikan biodata & riwayat pendidikan telah terisi')
            ->options(function ($query) {
                return $query->whereHas('biodata')
                    ->whereHas('biodata.riwayatPendidikan')
                    ->get();
            })
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('jml_surat')
            ->label('Jumlah Surat')
            ->type('number')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('thn_ajaran')
            ->type('number')
            ->attributes([
                'step'    => 'any',
                'min'     => 1900,
                'max'     => 3000
            ])
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

    public function approve($id){

        if ((\request('tanda_tangan_id') == null) ||
            (\request('tgl_ambil') == null)){
            Alert::error('Semua field harus diisi')->flash();
            return redirect()->back();
        }

        $kb = KetNonBeasiswa::find($id);
        $kb->update([
            'tanda_tangan_id' => request('tanda_tangan_id'),
            'tgl_ambil'     => request('tgl_ambil'),
            'status' => 'disetujui'
        ]);

        Notification::send($kb->user,
            new KetNonBeasiswaNotification($kb));

        Alert::success('Keterangan tidak menerima beasiswa berhasil disetujui')->flash();
        return redirect('admin/ketnonbeasiswa');
    }

    public function decline($id){
        $kb = KetNonBeasiswa::find($id);
        $kb->update([
            'status' => 'ditolak'
        ]);

        Notification::send($kb->user,
            new KetNonBeasiswaNotification($kb));
    }

    public function print($id){

        $izin = KetNonBeasiswa::find($id);
        $t_ajaran_1 = intval($izin->thn_ajaran);
        $t_ajaran_2 = $t_ajaran_1 + 1;
        $template = new TemplateProcessor('word-template/M-ket-non-beasiswa.docx');
        $template->setValues([
            'no_surat' => $izin->no_surat,
            'nama_arab' => $izin->user->biodata->nama,
            'no_paspor' => $izin->user->biodata->no_paspor,
            'pekerjaan' => $izin->user->biodata->pekerjaan,
            'thn_ajaran' => $t_ajaran_1 . "/" . $t_ajaran_2,
            'tgl_verif' => now()->format('d M Y'),
            'ttd_nama' => $izin->tandaTangan->nama,
            'ttd_jabatan' => $izin->tandaTangan->jabatan,

        ]);

        $filename = 'keterangan-non-beasiswa_' . $izin->user->name;
        $template->saveAs($filename . '.docx' );

        $izin->update([
            'status' => 'disetujui'
        ]);

        return response()->download($filename . '.docx', '')
            ->deleteFileAfterSend(true);
    }
}
