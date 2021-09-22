<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Requests\AktaLahirRequest;
use App\Models\AktaLahir;
use App\Notifications\AktaLahirNotification;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Notification;
use PhpOffice\PhpWord\TemplateProcessor;
use PHPUnit\TextUI\Help;
use Prologue\Alerts\Facades\Alert;

/**
 * Class AktaLahirCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AktaLahirCrudController extends CrudController
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
        CRUD::setModel(\App\Models\AktaLahir::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/aktalahir');
        CRUD::setEntityNameStrings('akta-lahir', 'Akta Lahir');
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
                    return backpack_url('aktalahir/' . $entry->id . '/show');
                },
                'style' => 'text-decoration:none'
            ]
        );

        CRUD::column('nama_bayi');
        CRUD::column('nama_ibu');


        CRUD::column('user')
            ->type('relationship')
            ->label('Pemohon');

        CRUD::column('created_at')
            ->type('date')
            ->label('diajukan');

        CRUD::column('tgl_ambil')
            ->type('date')
            ->label('diambil');

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
        CRUD::setValidation(AktaLahirRequest::class);

        CRUD::field('id');
        CRUD::field('user_id');
        CRUD::field('no_surat');
        CRUD::field('no_permohonan');
        CRUD::field('nama');
        CRUD::field('tempat_lahir');
        CRUD::field('tgl_lahir');
        CRUD::field('nama_ayah');
        CRUD::field('nama_ibu');
        CRUD::field('img_sk_dokter');
        CRUD::field('img_paspor_ayah');
        CRUD::field('img_paspor_ibu');
        CRUD::field('img_izin_tinggal_ayah');
        CRUD::field('img_izin_tinggal_ibu');
        CRUD::field('alasan_ditolak');
        CRUD::field('status');
        CRUD::field('tgl_ambil');
        CRUD::field('created_at');
        CRUD::field('updated_at');

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

        if (
            (\request('tanda_tangan_id') == null) ||
            (\request('tgl_ambil') == null)){
            Alert::error('Semua field harus diisi')->flash();
            return redirect()->back();
        }

        $kb = AktaLahir::find($id);
        $kb->update([
            'tanda_tangan_id' => request('tanda_tangan_id'),
            'tgl_ambil'     => request('tgl_ambil'),
            'status' => 'disetujui'
        ]);
        Notification::send($kb->user,
            new AktaLahirNotification($kb));

        Alert::success('Akta Lahir telah di setujui')->flash();
        return redirect('admin/aktalahir');
    }

    public function decline($id){
        $kb= AktaLahir::find($id);
        $kb->update([
            'status' => 'ditolak',
            'alasan_ditolak' => request('alasan_ditolak')
        ]);

        Notification::send($kb->user,
            new AktaLahirNotification($kb));

        Alert::success('Akta Lahir telah di tolak')->flash();
        return redirect('admin/aktalahir');
    }

    public function delete($id){
        AktaLahir::destroy($id);
        Alert::success('Akta Lahir telah di hapus')->flash();
        return redirect('admin/aktalahir');
    }

    public function print($id){
        $akta = AktaLahir::find($id);

        $update = Helper::generateDate($akta->updated_at->isoFormat('dddd/D/M/Y'));

        $tgl_lahir = new Carbon($akta->tgl_lahir);

        $kelahiran = Helper::generateDate($tgl_lahir->isoFormat('dddd/D/M/Y'));

        $no_surat = Helper::generateAktaSurat($akta->no_surat, $akta->updated_at );

        $anak_ke = Helper::anakKe($akta->anak_ke);

        $template = new TemplateProcessor('word-template/U-akta-lahir.docx');
        $template->setValues([
            'kode_surat' => $akta->no_surat,
            'no_surat' => $no_surat,
            'update_hari' => $update['hari'],
            'update_tanggal' => $update['tanggal'],
            'update_bulan' => $update['bulan'],
            'update_tahun' => $update['tahun'],
            'hari_lahir' => $kelahiran['hari'],
            'tanggal_lahir' => $kelahiran['tanggal'],
            'bulan_lahir' => $kelahiran['bulan'],
            'tahun_lahir' => $kelahiran['tahun'],
            'jam_lahir' => $tgl_lahir->format('H:i'),
            'nama_bayi' => strtoupper($akta->nama_bayi),
            'anak_ke' => $anak_ke,
            'kelamin' => $akta->jenis_kelamin,
            'nama_ayah' => $akta->nama_ayah,
            'nama_ibu' => $akta->nama_ibu,
            'kewarganegaraan_ayah' => $akta->kewarganegaraan_ayah,
            'kewarganegaraan_ibu' => $akta->kewarganegaraan_ibu,
            'paspor_ayah' => $akta->no_paspor_ayah,
            'paspor_ibu' => $akta->no_paspor_ibu,
            'alamat_ayah' => $akta->alamat_mesir_ayah,
            'alamat_ibu' => $akta->alamat_mesir_ibu,

            'tgl_verif' => now()->isoFormat('dddd, D MMMM Y'),
            'ttd_nama' => $akta->tandaTangan->nama,
            'ttd_jabatan' => $akta->tandaTangan->jabatan,

        ]);

        $filename = 'akta-lahir_' . $akta->user->name;
        $template->saveAs($filename . '.docx' );

        $akta->update([
            'status' => 'disetujui'
        ]);

        return response()->download($filename . '.docx', '')
            ->deleteFileAfterSend(true);
    }
}
