<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Mahasiswa\PindahKuliahLuarNegeri;
use App\Models\User;
use App\Notifications\PindahLuarNegeriNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Facades\DataTables;

class PindahKuliahLuarNegeriController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = PindahKuliahLuarNegeri::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(PindahKuliahLuarNegeri $izin) {

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
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pages.surat.pindah_kuliah_luar_negeri.index');
    }

    public function create()
    {
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new PindahKuliahLuarNegeri(), 'no_surat', 'M/KLN', 4);
        return \view('pages.surat.pindah_kuliah_luar_negeri.create', [
            'user' => $user,
            'no_surat'   => $no_surat
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'tujuan' => 'required',
            'jml_surat'    => 'required',
            'keperluan' => 'required',
            'no_surat' => 'unique:pindah_kuliah_luar_negeris'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new PindahKuliahLuarNegeri(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        $pk = PindahKuliahLuarNegeri::create([
            'user_id' => backpack_user()->id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'status' => 'new'
        ]);

        $admins = User::whereHas('roles', function ($query){
            $query->where('id', 1);
        })->get();

        Notification::send($admins, new PindahLuarNegeriNotification(
            $pk->with('user')->where('id', $pk->id)->first()
        ));

        return \redirect('surat/pindah-kuliah-luar-negeri')
            ->with('successMsg','Pengajuan Pindah Kuliah ke Luar Negeri berhasil di ajukan');
    }

}
