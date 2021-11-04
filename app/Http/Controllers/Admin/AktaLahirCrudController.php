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

    public function store()
    {
        $this->crud->setOperationSetting('saveAllInputsExcept', ['my_input_name', '_token', '_method', 'http_referrer', 'current_tab', 'save_action']);

        $this->crud->addField(['type' => 'hidden', 'name' => 'no_permohonan']);

        $this->crud->getRequest()->request->add([
            'no_permohonan'=> Helper::generateId(AktaLahir::class,
                'no_permohonan',
                strtoupper(substr(request('nama_bayi'), 0, 1)) . '/' . request('user_id') ,
                3 )
        ]);

        return $this->traitStore();
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
        $agama = \App\Models\Agama::all();

        CRUD::setValidation(AktaLahirRequest::class);

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
        CRUD::field('no_surat')
            ->default(Helper::generateId(AktaLahir::class, 'no_surat', 'U/AL', 4 ))
            ->attributes([
                'readonly' => 'readonly'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_bayi');
        CRUD::field('tempat_lahir');
        CRUD::field('tgl_lahir')
            ->type('datetime_picker')
            ->label('Waktu Lahir')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('jenis_kelamin')
            ->type('select2_from_array')
            ->options([
                'laki-laki' => 'Laki-laki',
                'perempuan' => 'Perempuan',
                'lainnya'   => 'Lainnya'
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('berat_kg')
            ->type('number')
            ->label('Berat Bayi')
            ->attributes([
                'step' => 'any'
            ])
            ->prefix('KG')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('berat_ons')
            ->type('number')
            ->label('Berat Bayi')
            ->attributes([
                'step' => 'any'
            ])
            ->prefix('ONS')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('panjang')
            ->type('number')
            ->label('Panjang Bayi')
            ->attributes([
                'step' => 'any'
            ])
            ->prefix('CM')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('kelahiran_ke')
            ->type('number')
            ->wrapper([
                'class' => 'form-group col-md-2'
            ]);
        CRUD::field('anak_ke')
            ->type('number')
            ->wrapper([
                'class' => 'form-group col-md-2'
            ]);
        CRUD::field('jenis_kelahiran')
            ->wrapper([
                'class' => 'form-group col-md-8'
            ]);

        CRUD::field('tempat_kelahiran')
            ->label('Tempat Kelahiran')
            ->wrapper([
                'class' => 'form-group col-md-8'
            ]);

        CRUD::field('tgl_surat_rs')
            ->type('date_picker')
            ->label('Tanggal Surat Rumah Sakit')
            ->date_picker_options([
                'todayBtn' => 'linked',
                'format'   => 'dd-mm-yyyy'
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('nama_rs')
            ->label('Nama Rumah Sakit');

        CRUD::field('alamat_rs')
            ->type('textarea')
            ->label('Alamat Rumah Sakit');

        CRUD::field('no_bukti')
            ->wrapper([
                'class' => 'form-group col-md-8'
            ]);
        CRUD::field('tgl_bukti')
            ->type('date_picker')
            ->label('Tanggal Bukti')
            ->date_picker_options([
                'todayBtn' => 'linked',
                'format'   => 'dd-mm-yyyy'
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('penerbit');

        CRUD::field('nama_ibu');
        CRUD::field('no_paspor_ibu')
            ->wrapper([
                'class' => 'form-group col-md-8'
            ]);
        CRUD::field('tgl_lahir_ibu')
            ->type('date_picker')
            ->label('Tanggal Lahir Ibu')
            ->date_picker_options([
                'todayBtn' => 'linked',
                'format'   => 'dd-mm-yyyy'
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('umur_ibu')
            ->wrapper([
                'class' => 'form-group col-md-2'
            ]);


        CRUD::field('agama_ibu')
            ->type('select2_from_array')
            ->options(
                (function() use ($agama){
                    $listAgama = [];
                    foreach ($agama as $key => $value){
                        $listAgama[$value->nama] = $value->nama;
                    }
                    return $listAgama;
                })()
            )
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('pekerjaan_ibu')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('alamat_indo_ibu')
            ->type('textarea')
            ->label('Alamat Ibu di Indonesia');
        CRUD::field('alamat_mesir_ibu')
            ->type('textarea')
            ->label('Alamat Ibu di Mesir');
        CRUD::field('tlp_ibu_indo')
            ->label('Nomor Telepon Ibu di Indonesia')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('tlp_ibu_mesir')
            ->label('Nomor Telepon Ibu di Mesir')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('kewarganegaraan_ibu');

        CRUD::field('nama_ayah');
        CRUD::field('no_paspor_ayah')
            ->wrapper([
                'class' => 'form-group col-md-8'
            ]);
        CRUD::field('tgl_lahir_ayah')
            ->type('date_picker')
            ->label('Tanggal Lahir Ayah')
            ->date_picker_options([
                'todayBtn' => 'linked',
                'format'   => 'dd-mm-yyyy'
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('umur_ayah')
            ->wrapper([
                'class' => 'form-group col-md-2'
            ]);

        CRUD::field('agama_ayah')
            ->type('select2_from_array')
            ->options(
                (function() use ($agama){
                    $listAgama = [];
                    foreach ($agama as $key => $value){
                        $listAgama[$value->nama] = $value->nama;
                    }
                    return $listAgama;
                })()
            )
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('pekerjaan_ayah')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('alamat_indo_ayah')
            ->type('textarea')
            ->label('Alamat Ayah di Indonesia');
        CRUD::field('alamat_mesir_ayah')
            ->type('textarea')
            ->label('Alamat Ayah di Mesir');
        CRUD::field('tlp_ayah_indo')
            ->label('Nomor Telepon Ayah di Indonesia')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('tlp_ayah_mesir')
            ->label('Nomor Telepon Ayah di Mesir')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('kewarganegaraan_ayah');

        CRUD::field('tgl_kawin')
            ->type('date_picker')
            ->label('Tanggal Kawin')
            ->date_picker_options([
                'todayBtn' => 'linked',
                'format'   => 'dd-mm-yyyy'
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('no_akta_kawin')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('instansi_kawin');

        CRUD::field('nik_pelapor')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('hubungan')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_pelapor');

        CRUD::field('nik_saksi_1')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_saksi_1')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('nik_saksi_2')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('nama_saksi_2')
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('img_sk_dokter')
            ->label('Upload Surat Keterangan Dokter')
            ->type('image')
            ->crop(true);
        CRUD::field('img_paspor_ayah')
            ->label('Upload Foto Paspor Ayah')
            ->type('image')
            ->crop(true);
        CRUD::field('img_paspor_ibu')
            ->label('Upload Foto Paspor Ibu')
            ->type('image')
            ->crop(true);
        CRUD::field('img_izin_tinggal_ayah')
            ->label('Upload Foto Izin Tinggal Ayah')
            ->type('image')
            ->crop(true);
        CRUD::field('img_izin_tinggal_ibu')
            ->label('Upload Foto Izin Tinggal Ibu')
            ->type('image')
            ->crop(true);
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
