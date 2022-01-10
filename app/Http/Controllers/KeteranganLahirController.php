<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\KeteranganLahir;
use App\Models\User;
use App\Notifications\KeteranganLahirNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Facades\DataTables;

class KeteranganLahirController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = KeteranganLahir::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(KeteranganLahir $izin) {

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

        return view('pages.surat.keterangan-lahir.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new KeteranganLahir(), 'no_surat', 'K/KL', 4);
        return \view('pages.surat.keterangan-lahir.create', [
            'user' => $user,
            'no_surat'   => $no_surat
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'tujuan' => 'required',
            'jml_surat'    => 'required',
            'keperluan' => 'required',
            'no_surat' => 'unique:keterangan_lahirs'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new KeteranganLahir(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        $mk = KeteranganLahir::create([
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

        Notification::send($admins, new KeteranganLahirNotification(
            $mk->with('user')->where('id', $mk->id)->first()
        ));

        return \redirect('surat/keterangan-lahir')
            ->with('successMsg','Keterangan lahir berhasil di ajukan');
    }
}
