<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InstituteRequest;
use App\Models\Mahasiswa\MasukKuliah;
use App\Notifications\MasukKuliahNotification;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Notification;
use PhpOffice\PhpWord\TemplateProcessor;
use Prologue\Alerts\Facades\Alert;

/**
 * Class MasukKuliahCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class InstituteCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Institute::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/institutes');
        CRUD::setEntityNameStrings('institute', 'Master Institute');
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
        CRUD::column('name_ar')->label('Nama Arab');
        CRUD::column('name_en')->label('Nama Latin');
        CRUD::column('location')->label('Alamat');

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(InstituteRequest::class);

        CRUD::field('name_ar')->label('Nama Arab');
        CRUD::field('name_en')->label('Nama Latin');
        CRUD::field('location')->label('Alamat');
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

        if ((\request('changable-word-id') == null) ||
            (\request('tanda_tangan_id') == null) ||
            (\request('tgl_ambil') == null)){
            Alert::error('Semua field harus diisi')->flash();
            return redirect()->back();
        }

        $kb = MasukKuliah::find($id);
        $cw = request('changable-word-id');
        $kb->update([
            'tanda_tangan_id' => request('tanda_tangan_id'),
            'tgl_ambil'     => request('tgl_ambil'),
            'status' => 'disetujui'
        ]);
        $kb->words()->attach($cw);

        Notification::send($kb->user,
            new MasukKuliahNotification($kb));

        Alert::success('Pendaftaran kuliah telah di setujui')->flash();
        return redirect('admin/masukkuliah');
    }

    public function decline($id){
        $kb =  MasukKuliah::find($id);
        $kb->update([
            'status' => 'ditolak'
        ]);
        Notification::send($kb->user,
            new MasukKuliahNotification($kb));
    }

    public function print($id){

        $izin = MasukKuliah::find($id);
        $t_ajaran_1 = intval(now()->isoFormat('Y'));
        $t_ajaran_2 = $t_ajaran_1 + 1;
        $template = new TemplateProcessor('word-template/M-masuk-kuliah.docx');
        $tujuan = $izin->words()->where('type', 'tujuan')->first();
        $template->setValues([
            'no_surat' => $izin->no_surat,
            'nama_arab' => $izin->user->biodata->nama,
            'no_paspor' => $izin->user->biodata->no_paspor,
            'tujuan' => $tujuan->deskripsi,
            'thn_ajaran' => $t_ajaran_1 . "/" . $t_ajaran_2,
            'tgl_verif' => now()->format('d M Y'),
            'ttd_nama' => $izin->tandaTangan->nama,
            'ttd_jabatan' => $izin->tandaTangan->jabatan,

        ]);

        $filename = 'masuk-kuliah_' . $izin->user->name;
        $template->saveAs($filename . '.docx' );

        $izin->update([
            'status' => 'disetujui'
        ]);

        return response()->download($filename . '.docx', '')
            ->deleteFileAfterSend(true);
    }
}
