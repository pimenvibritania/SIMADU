<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\TidakKeluarNegeri;
use App\Models\User;
use App\Notifications\TidakKeluarNegeriNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Facades\DataTables;

class TidakKeluarNegeriController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = TidakKeluarNegeri::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(TidakKeluarNegeri $izin) {

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

        return view('pages.surat.tidak-keluar-negeri.index');
    }

    public function create(){
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new TidakKeluarNegeri(), 'no_surat', 'K/TK', 4);
        return \view('pages.surat.tidak-keluar-negeri.create', [
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
            'tempat_tujuan' => 'required',
            'no_surat' => 'unique:tidak_keluar_negeris'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new TidakKeluarNegeri(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        $mk = TidakKeluarNegeri::create([
            'user_id' => backpack_user()->id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'tempat_tujuan' => $request->tujuan,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'status' => 'new'
        ]);

        $admins = User::whereHas('roles', function ($query){
            $query->where('id', 1);
        })->get();

        Notification::send($admins, new TidakKeluarNegeriNotification(
            $mk->with('user')->where('id', $mk->id)->first()
        ));

        return \redirect('surat/tidak-keluar-negeri')
            ->with('successMsg','Surat keterangan tidak keluar negeri berhasil di ajukan');
    }

}
