<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Mahasiswa\MintaTashdiq;
use App\Models\User;
use App\Notifications\MintaTashdiqNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Facades\DataTables;

class MintaTashdiqController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = MintaTashdiq::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(MintaTashdiq $izin) {

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

        return view('pages.surat.minta_tashdiq.index');
    }

    public function create()
    {
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new MintaTashdiq(), 'no_surat', 'M/MT', 4);
        return \view('pages.surat.minta_tashdiq.create', [
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
            'no_surat' => 'unique:minta_tashdiqs'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new MintaTashdiq(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        $mk = MintaTashdiq::create([
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

        Notification::send($admins, new MintaTashdiqNotification(
            $mk->with('user')->where('id', $mk->id)->first()
        ));


        return \redirect('surat/minta-tashdiq')
            ->with('successMsg','Pengantar permintaan tashdiq berhasil diajukan');
    }
}
