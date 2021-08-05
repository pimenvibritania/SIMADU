<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Mahasiswa\Fakultas;
use App\Models\Mahasiswa\KuliahIftha;
use App\Models\User;
use App\Notifications\KuliahIfthaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Facades\DataTables;

class KuliahIfthaController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = KuliahIftha::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('fakultas', function ($request){
                    $fak = Fakultas::find($request->fakultas_id);
                    return $fak->nama;
                })
                ->editColumn('kampus', function ($request){
                    $fak = Fakultas::find($request->fakultas_id);
                    return $fak->kampus;
                })
                ->editColumn('status', function(KuliahIftha $izin) {

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

        return view('pages.surat.kuliah_iftha.index');
    }

    public function create()
    {
        $user = backpack_user()->biodata;
        $fakultas = Fakultas::all();
        $no_surat = Helper::generateId(new KuliahIftha(), 'no_surat', 'M/KI', 4);
        return \view('pages.surat.kuliah_iftha.create', [
            'user' => $user,
            'no_surat'   => $no_surat,
            'fakultas' => $fakultas

        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'fakultas_id' => 'required',
            'tujuan' => 'required',
            'jml_surat'    => 'required',
            'keperluan' => 'required',
            'no_surat' => 'unique:kuliah_ifthas'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new KuliahIftha(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        $mk = KuliahIftha::create([
            'user_id' => backpack_user()->id,
            'fakultas_id' => $request->fakultas_id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'type' => 'custom',
            'status' => 'new'
        ]);

        $admins = User::whereHas('roles', function ($query){
            $query->where('id', 1);
        })->get();

        Notification::send($admins, new KuliahIfthaNotification(
            $mk->with('user')->where('id', $mk->id)->first()
        ));


        return \redirect('surat/kuliah-iftha')
            ->with('successMsg','Pendaftaran Kuliah Iftha di ajukan');
    }
}
