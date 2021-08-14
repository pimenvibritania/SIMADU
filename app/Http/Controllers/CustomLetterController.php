<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Mahasiswa\CustomLetter;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomLetterController extends Controller
{
    //
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = CustomLetter::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(CustomLetter $izin) {

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

        return view('pages.surat.custom_letter.index');
    }

    public function create()
    {
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new CustomLetter(), 'no_surat', 'M/KI', 4);
        return \view('pages.surat.custom_letter.create', [
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
            'no_surat' => 'unique:custom_letters'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new CustomLetter(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        CustomLetter::create([
            'user_id' => backpack_user()->id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'type' => 'custom',
            'status' => 'new'
        ]);

        return \redirect('surat/custom-letter')
            ->with('successMsg','Pengajuan Pindah Kuliah ke Indonesia berhasil di ajukan');
    }

}
