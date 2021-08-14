<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\KeteranganBelajarRequest;
use App\Models\Mahasiswa\KeteranganBelajar;
use App\Models\User;
use App\Notifications\KeteranganBelajarNotification;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Notification;
use PhpOffice\PhpWord\TemplateProcessor;
use Prologue\Alerts\Facades\Alert;

/**
 * Class KeteranganBelajarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class KeteranganBelajarCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Mahasiswa\KeteranganBelajar::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/keterangan-belajar');
        CRUD::setEntityNameStrings('keterangan-belajar', 'keterangan-belajars');
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
                    return backpack_url('keterangan-belajar/' . $entry->id . '/show');
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
        CRUD::setValidation(KeteranganBelajarRequest::class);

        CRUD::setFromDb(); // fields

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

        if ((\request('tanda_tangan_id') == null) ||
            (\request('tgl_ambil') == null)){
            Alert::error('Semua field harus diisi')->flash();
            return redirect()->back();
        }

        $izin = KeteranganBelajar::find($id);
        $t_ajaran_1 = intval(now()->isoFormat('Y'));
        $t_ajaran_2 = $t_ajaran_1 + 1;
        $template = new TemplateProcessor('word-template/M-keterangan-belajar.docx');
        $template->setValues([
            'no_surat' => $izin->no_surat,
            'nama' => $izin->user->name,
//            'nama_arab' => $izin->user->biodata->nama,
            'no_paspor' => $izin->user->biodata->no_paspor,
            'pekerjaan' => $izin->user->biodata->pekerjaan,
            'tgl_lahir' => $izin->user->biodata->tanggal_lahir->format('d/M/Y'),
            'alamat_mesir' => $izin->user->biodata->alamat_mesir,
            'kota_mesir' => $izin->user->biodata->kota_mesir,
            'provinsi_mesir' => $izin->user->biodata->provinsi_mesir,
            'no_mesir' => $izin->user->biodata->no_mesir,
            'thn_ajaran' => $t_ajaran = $t_ajaran_1 . "/" . $t_ajaran_2,
            'tgl_verif' => now()->isoFormat('dddd, D MMMM Y'),
            'ttd_nama' => $izin->tandaTangan->nama,
            'ttd_jabatan' => $izin->tandaTangan->jabatan,
            'ttd_nip' => $izin->tandaTangan->nip,

        ]);

        $filename = 'keterangan-belajar' . $izin->user->name;
        $template->saveAs($filename . '.docx' );

        $izin->update([
            'status' => 'diunduh'
        ]);

        return response()->download($filename . '.docx', '')
            ->deleteFileAfterSend(true);
    }

    public function approve($id){

        $kb = KeteranganBelajar::find($id);
        $kb->update([
            'tanda_tangan_id' => request('tanda_tangan_id'),
            'tgl_ambil'     => request('tgl_ambil'),
            'status' => 'disetujui'
        ]);

        Notification::send($kb->user,
            new KeteranganBelajarNotification($kb));

        Alert::success('Surat izin telah di setujui')->flash();
        return redirect('admin/keterangan-belajar');
    }

    public function decline($id){
        KeteranganBelajar::find($id)->update([
            'status' => 'ditolak'
        ]);
    }
}
