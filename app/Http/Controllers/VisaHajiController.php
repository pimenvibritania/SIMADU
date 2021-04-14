<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\VisaHaji;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VisaHajiController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = VisaHaji::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(VisaHaji $izin) {

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

        return view('pages.surat.visa-haji.index');
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


    public function create(){
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new VisaHaji(), 'no_surat', 'K/VH', 4);
        return \view('pages.surat.visa-haji.create', [
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
            'no_surat' => 'unique:visa_hajis'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new VisaHaji(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        VisaHaji::create([
            'user_id' => backpack_user()->id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'status' => 'new'
        ]);

        return \redirect('surat/visa-haji')
            ->with('successMsg','Visa Haji berhasil di ajukan');
    }

}
