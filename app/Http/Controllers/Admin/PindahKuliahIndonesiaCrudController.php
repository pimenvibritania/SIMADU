<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Requests\PindahKuliahIndonesiaRequest;
use App\Models\Mahasiswa\PindahKuliahIndonesia;
use App\Notifications\PindahKuliahNotification;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Notification;
use PhpOffice\PhpWord\TemplateProcessor;
use Prologue\Alerts\Facades\Alert;

/**
 * Class PindahKuliahIndonesiaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PindahKuliahIndonesiaCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Mahasiswa\PindahKuliahIndonesia::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pindah-kuliahindonesia');
        CRUD::setEntityNameStrings('pindahkuliahindonesia', 'Pindah Kuliah ke Indonesia');
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
            'approved' => 'Approved',
            'declined' => 'Declined',
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
                    return backpack_url('pindah-kuliah-indonesia/' . $entry->id . '/show');
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
        CRUD::setValidation(PindahKuliahIndonesiaRequest::class);

        CRUD::field('no_surat')
            ->default(Helper::generateId(
                PindahKuliahIndonesia::class,
                'no_surat',
                'M/KI',
                4 ))
            ->attributes([
                'readonly' => 'readonly'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('no_permohonan')
            ->default(Helper::generateId(
                PindahKuliahIndonesia::class,
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
        $izin = PindahKuliahIndonesia::find($id);
        $template = new TemplateProcessor('word-template/M-pindah-kuliah-indonesia.docx');
        $template->setValues([
            'no_surat' => $izin->no_surat,
            'nama' => $izin->user->name,
            'no_paspor' => $izin->user->biodata->no_paspor,
            'pekerjaan' => $izin->user->biodata->pekerjaan,
            'tgl_lahir' => $izin->user->biodata->tanggal_lahir->format('d/M/Y'),
            'alamat_mesir' => $izin->user->biodata->alamat_mesir,
            'kota_mesir' => $izin->user->biodata->kota_mesir,
            'provinsi_mesir' => $izin->user->biodata->provinsi_mesir,
            'no_mesir' => $izin->user->biodata->no_mesir,
            'tgl_verif' => now()->isoFormat('dddd, D MMMM Y'),
            'ttd_nama' => $izin->tandaTangan->nama,
            'ttd_jabatan' => $izin->tandaTangan->jabatan,
            'ttd_nip' => $izin->tandaTangan->nip,

        ]);

        $filename = 'pindah-kuliah-indonesia' . $izin->user->name;
        $template->saveAs($filename . '.docx' );

        $izin->update([
            'status' => 'approved'
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

        $pk = PindahKuliahIndonesia::find($id);
        $pk->update([
            'tanda_tangan_id' => request('tanda_tangan_id'),
            'tgl_ambil'     => request('tgl_ambil'),
            'status' => 'disetujui'
        ]);

        Notification::send($pk->user,
            new PindahKuliahNotification($pk));

        Alert::success('Surat izin telah di setujui')->flash();
        return redirect('admin/pindah-kuliahindonesia');
    }

    public function decline($id){
        PindahKuliahIndonesia::find($id)->update([
            'status' => 'ditolak'
        ]);
    }
}
