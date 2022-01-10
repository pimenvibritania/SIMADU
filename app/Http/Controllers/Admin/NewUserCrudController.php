<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Requests\AlamatIndonesiaRequest;
use App\Models\AlamatIndonesia;
use App\Models\Biodata;
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
 * Class NewUserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class NewUserCrudController extends CrudController
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
        CRUD::setModel(Biodata::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/new-users');
        CRUD::setEntityNameStrings('new user', 'Pengajuan User Baru');
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

        $this->crud->addButtonFromView('line', 'new_user', 'new_user', 'end');

        $this->crud->query->orWhereNull('verified_date');

        CRUD::column('noreg')
            ->label('No Registrasi')
            ->wrapper(
            [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('new-users/' . $entry->id . '/show');
                },
                'style' => 'text-decoration:none'
            ]
        );

        CRUD::column('nama');
        CRUD::column('img_profile')
            ->type('image')
            ->prefix('uploads/biodata/img_profile/');
        CRUD::column('kelamin');
        CRUD::column('tanggal_lahir');
        CRUD::column('no_paspor');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {

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

    public function approve($id)
    {
        Biodata::find($id)->update([
            'verified_date' => date('Y-m-d H:i:s'),
            'verified_by'     => backpack_user()->name,
        ]);

        Alert::success('Pengajuan user telah berhasil diverifikasi')->flash();
        return redirect('admin/new-users');
    }

    public function decline($id)
    {
        Biodata::find($id)->delete();
        Alert::success('Pengajuan user telah berhasil ditolak')->flash();
        return redirect('admin/new-users');
    }

}
