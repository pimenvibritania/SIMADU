<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Legalisir;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LegalisirController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Legalisir::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(Legalisir $izin) {

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

        return view('pages.surat.legalisir.index');
    }

    private function getActionColumn($data)
    {
        $showUrl = route('legalisir.show', $data->id);
        return "<a class='waves-effect btn mybtn' data-value='$data->id'
                href='$showUrl'><i class='fa fa-eye'></i> Details</a>";
//        $editUrl = route('admin.brands.edit', $data->id);
//        return "<a class='waves-effect btn btn-success' data-value='$data->id' href='$showUrl'><i class='material-icons'>visibility</i>Details</a>
//                        <a class='waves-effect btn btn-primary' data-value='$data->id' href='$editUrl'><i class='material-icons'>edit</i>Update</a>
//                        <button class='waves-effect btn deepPink-bgcolor delete' data-value='$data->id' ><i class='material-icons'>delete</i>Delete</button>";
    }

    public function create(){
        $user = backpack_user();
        $no_permohonan = Helper::generateId(new Legalisir(),
            'no_permohonan',
            strtoupper(substr($user->name, 0, 1)) . '/' . backpack_user()->id ,
            3);
        return \view('pages.surat.legalisir.create', [
            'user' => $user->biodata,
            'no_permohonan'   => $no_permohonan
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'jml_surat'    => 'required',
            'keperluan' => 'required',
            'file_img_docs' => 'required|mimetypes:application/pdf|max:10000',
            'no_permohonan' => 'unique:legalisirs'
        ]);

        $filename = auth()->user()->email . '_' . time() . '.' .
            $request->file_img_docs->extension();

        $request['img_docs'] = $filename;
        $request->file_img_docs->move(public_path('uploads/legalisir'), $filename);
        $request['user_id'] = backpack_auth()->id();
        Legalisir::create($request->all());

        return \redirect('surat/legalisir')
            ->with('successMsg','Permohonan legalisir dokumen berhasil di ajukan');
    }
}
