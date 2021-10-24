<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Mahasiswa\CabutBerkas;
use App\Models\User;
use App\Notifications\CabutBerkasNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Facades\DataTables;

class CabutBerkasController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = CabutBerkas::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(CabutBerkas $izin) {

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

        return view('pages.surat.cabut_berkas.index');
    }

    public function create()
    {
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new CabutBerkas(), 'no_surat', 'M/CB', 4);
        return \view('pages.surat.cabut_berkas.create', [
            'user' => $user,
            'no_surat'   => $no_surat,

        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'tujuan' => 'required',
            'jml_surat'    => 'required',
            'keperluan' => 'required',
            'thn_ajaran' => 'required',
            'no_surat' => 'unique:cabut_berkas'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new CabutBerkas(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        $mk = CabutBerkas::create([
            'user_id' => backpack_user()->id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'thn_ajaran' => $request->thn_ajaran,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'type' => 'custom',
            'status' => 'new'
        ]);

        $admins = User::whereHas('roles', function ($query){
            $query->where('id', 1);
        })->get();

        Notification::send($admins, new CabutBerkasNotification(
            $mk->with('user')->where('id', $mk->id)->first()
        ));

        return \redirect('surat/cabut-berkas')
            ->with('successMsg','Keterangan permintaan cabut berkas berhasil diajukan');
    }
}
