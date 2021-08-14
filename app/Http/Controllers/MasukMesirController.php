<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\AlamatMesir;
use App\Models\MasukMesir;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class MasukMesirController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = MasukMesir::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(MasukMesir $izin) {

                    if ($izin->status == 'new'){

                        return '<a href="javascript:void(0)"
                                style="cursor: not-allowed;"
                                class="btn btn-secondary">diajukan</a>
                                ';

                    } elseif ($izin->status == 'declined'){
                        return '<a href="javascript:void(0)"
                                style="cursor: not-allowed;"
                               class="btn  btn-danger">ditolak</a>
                               ';
                    } else{
                        return '<a href="javascript:void(0)"
                                style="cursor: not-allowed;"
                               class="btn btn-success">disetujui</a>
                               ';
                    }

                })
                ->addColumn('action', function($row){

//                    $btn = '<a href="{{url()}}" class="edit btn btn-primary btn-sm">View</a>';

                    return $this->getActionColumn($row);
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }

        return view('pages.surat.masuk-mesir.index');
    }

    private function getActionColumn($data)
    {
        $showUrl = route('izin-tinggal.show', $data->id);
        return "<a class='waves-effect btn mybtn' data-value='$data->id'
                href='$showUrl'><i class='fa fa-eye'></i> Details</a>";
//        $editUrl = route('admin.brands.edit', $data->id);
//        return "<a class='waves-effect btn btn-success' data-value='$data->id' href='$showUrl'><i class='material-icons'>visibility</i>Details</a>
//                        <a class='waves-effect btn btn-primary' data-value='$data->id' href='$editUrl'><i class='material-icons'>edit</i>Update</a>
//                        <button class='waves-effect btn deepPink-bgcolor delete' data-value='$data->id' ><i class='material-icons'>delete</i>Delete</button>";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new MasukMesir(), 'no_surat', 'K/MM', 4);
        return \view('pages.surat.masuk-mesir.create', [
            'user' => $user,
            'no_surat'   => $no_surat
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'tujuan' => 'required',
            'jml_surat'    => 'required',
            'keperluan' => 'required',
            'no_surat' => 'unique:masuk_mesirs'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new MasukMesir(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        MasukMesir::create([
            'user_id' => backpack_user()->id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'status' => 'new'
        ]);

        return \redirect('surat/masuk-mesir')
            ->with('successMsg','Izin masuk Mesir berhasil di ajukan');
    }
}
