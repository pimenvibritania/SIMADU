<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PendidikanMesirRequest;
use App\Models\Biodata;
use App\Models\Institute;
use App\Models\MasterLevel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PendidikanMesirCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PendidikanMesirCrudController extends CrudController
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

    public function store()
    {
//        dd(request()->all());
        $thn1 = request('thn_ajaran_1');
        $thn2 = request('thn_ajaran_2');
        $thn_ajaran = "$thn1/$thn2";

        $this->crud->addField(['type' => 'hidden', 'name' => 'thn_ajaran']);
        $this->crud->getRequest()->request->add(['thn_ajaran'=> $thn_ajaran]);

        return $this->traitStore();
    }


    public function update()
    {
        $thn1 = request('thn_ajaran_1');
        $thn2 = request('thn_ajaran_2');
        $thn_ajaran = "$thn1/$thn2";

        $this->crud->addField(['type' => 'hidden', 'name' => 'thn_ajaran']);
        $this->crud->getRequest()->request->add(['thn_ajaran'=> $thn_ajaran]);

        return $this->traitUpdate();
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\PendidikanMesir::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pendidikanmesir');
        CRUD::setEntityNameStrings('pendidikanmesir', 'Pendidikan Mesir');
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

        CRUD::column('user')->type('relationship')
            ->label('name');

        CRUD::column('thn_ajaran')
            ->label('Tahun ajaran');

        CRUD::column('tgl_lapor')
            ->label('Tanggal Lapor');

        CRUD::column('institute_id')
            ->type('relationship')
            ->label('Institute');

        CRUD::column('jurusan_id')
            ->type('relationship')
            ->label('Jurusan');

        CRUD::column('ket_naik')
            ->label('Ket Naik');

        CRUD::column('nilai')
            ->label('Nilai');

        CRUD::column('jenjang_id')
            ->type('relationship')
            ->label('Jenjang');

        CRUD::column('fakultas_id')
            ->type('relationship')
            ->label('Fakultas');

        CRUD::column('masterLevel')
            ->type('relationship')
            ->label('Tingkat');

        CRUD::column('keterangan')
            ->label('Institute');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PendidikanMesirRequest::class);

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

        CRUD::field('thn_ajaran_1')
            ->label('Tahun ajaran dari')
            ->type('number')
            ->attributes([
                'min' => 1900,
                'max'   => 3000,
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('thn_ajaran_2')
            ->label('Tahun ajaran sampai')
            ->type('number')
            ->attributes([
                'min' => 1900,
                'max'   => 3000,
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('tgl_lapor')
            ->type('datetime')
            ->datetime_picker_options([
                'format' => 'DD/MM/YYYY HH:mm',
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('institute_id')
            ->type('select')
            ->attribute('name_en')
            ->entity('institute')
            ->model(Institute::class)
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('jenjang_id')
            ->type('select_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'jenjang_attr',
            ])
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);
        CRUD::field('fakultas_id')
            ->type('select_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'fakultas_attr',
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);
        CRUD::field('jurusan_id')
            ->type('select_from_array')
            ->options([])
            ->allows_null(false)
            ->attributes([
                'id'    => 'jurusan_attr',
            ])
            ->wrapper([
                'class' => 'form-group col-md-6'
            ]);

        CRUD::field('master_level_id')
            ->label('tingkat')
            ->type('select')
            ->attribute('tingkat')
            ->entity('tingkat')
            ->model(MasterLevel::class)
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('ket_naik')
            ->label('Keterangan Naik')
            ->type('select_from_array')
            ->options([
                'naik' => 'Naik',
                'tidak' => 'Tidak'
            ])
            ->allows_null(false)
            ->default('naik')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('nilai')
            ->label('Nilai')
            ->type('select_from_array')
            ->options([
                'istimewa' => 'Istimewa',
                'baik sekali' => 'Baik Sekali',
                'baik' => 'Baik',
                'cukup' => 'Cukup',
                'gagal' => 'Gagal',
            ])
            ->allows_null(false)
            ->default('cukup')
            ->wrapper([
                'class' => 'form-group col-md-4'
            ]);

        CRUD::field('keterangan')
            ->type('text');

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
}
