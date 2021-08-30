<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Legalisir;
use App\Models\User;
use App\Notifications\LegalisirNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
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

                    } elseif ($izin->status == 'ditolak'){
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
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pages.surat.legalisir.index');
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

        $mk = Legalisir::create($request->all());

        $admins = User::whereHas('roles', function ($query){
            $query->where('id', 1);
        })->get();

        Notification::send($admins, new LegalisirNotification(
            $mk->with('user')->where('id', $mk->id)->first()
        ));

        return \redirect('surat/legalisir')
            ->with('successMsg','Permohonan legalisir dokumen berhasil di ajukan');
    }
}
