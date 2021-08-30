<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\AktaLahir;
use App\Models\User;
use App\Notifications\AktaLahirNotification;
use Illuminate\Http\Request as Requests;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Facades\DataTables;

class AktaLahirController extends Controller
{
    public function index(Requests $request)
    {

        if ($request->ajax()) {
            $data = AktaLahir::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(AktaLahir $izin) {

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

        return view('pages.surat.akta-lahir.index');
    }

    public function create()
    {
        $user = backpack_user();
        $no_surat = Helper::generateId(new AktaLahir(), 'no_surat', 'U/AL', 4);
        $no_permohonan = Helper::generateId(new AktaLahir(),
            'no_permohonan',
            strtoupper(substr($user->name, 0, 1)) . '/' . $user->id ,
            3);

        return \view('pages.surat.akta-lahir.create', [
            'user' => $user,
            'no_surat'   => $no_surat,
            'no_permohonan' => $no_permohonan
        ]);
    }

    public function store(Requests $request){
        $request['user_id'] = auth()->user()->id;

        $request->validate([
            'no_surat' => 'required',
            'no_permohonan' => 'required',

            'nama_bayi'=> 'required',
            'tempat_lahir'=> 'required',
            'tgl_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'berat_kg'=> 'required',
            'berat_ons'=> 'required',
            'panjang'=> 'required',
            'kelahiran_ke'=> 'required',
            'anak_ke'=> 'required',
            'jenis_kelahiran'=> 'required',

            'tgl_surat_rs'=> 'required',
            'nama_rs'=> 'required',
            'alamat_rs'=> 'required',

            'no_bukti'=> 'required',
            'tgl_bukti'=> 'required',
            'penerbit'=> 'required',

            'nama_ibu'=> 'required',
            'no_paspor_ibu'=> 'required',
            'tgl_lahir_ibu'=> 'required',
            'umur_ibu'=> 'required',
            'pekerjaan_ibu'=>'required',
            'alamat_indo_ibu'=> 'required',
            'tlp_ibu_indo'=> 'required',
            'alamat_mesir_ibu'=> 'required',
            'tlp_ibu_mesir'=> 'required',
            'kewarganegaraan_ibu'=> 'required',
            'agama_ibu'=> 'required',

            'nama_ayah'=> 'required',
            'no_paspor_ayah'=> 'required',
            'tgl_lahir_ayah'=> 'required',
            'umur_ayah'=> 'required',
            'pekerjaan_ayah'=>'required',
            'alamat_indo_ayah'=> 'required',
            'tlp_ayah_indo'=> 'required',
            'alamat_mesir_ayah'=> 'required',
            'tlp_ayah_mesir'=> 'required',
            'kewarganegaraan_ayah'=> 'required',
            'agama_ayah'=> 'required',

            'tgl_kawin'=> 'required',
            'no_akta_kawin'=> 'required',
            'instansi_kawin'=> 'required',

            'nik_pelapor'=> 'required',
            'nama_pelapor'=> 'required',
            'hubungan'=> 'required',

            'nama_saksi_1'=> 'required',

            'file_sk_dokter' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_paspor_ayah' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_paspor_ibu' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_izin_tinggal_ayah' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_izin_tinggal_ibu' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sk_dokter = auth()->user()->email . '_' . time() . '.' .
            $request->file_sk_dokter->extension();

        $paspor_ayah = auth()->user()->email . '_' . time() . '.' .
            $request->file_paspor_ayah->extension();

        $paspor_ibu = auth()->user()->email . '_' . time() . '.' .
            $request->file_paspor_ibu->extension();

        $izin_ayah = auth()->user()->email . '_' . time() . '.' .
            $request->file_izin_tinggal_ayah->extension();

        $izin_ibu = auth()->user()->email . '_' . time() . '.' .
            $request->file_izin_tinggal_ibu->extension();

        $request['img_sk_dokter'] =  $sk_dokter;
        $request['img_paspor_ayah'] = $paspor_ayah;
        $request['img_paspor_ibu'] = $paspor_ibu;
        $request['img_izin_tinggal_ayah'] = $izin_ayah;
        $request['img_izin_tinggal_ibu'] = $izin_ibu;
        $request['status'] = 'new';

        $request->file_sk_dokter->move(public_path('uploads/akta/sk_dokter'), $sk_dokter);
        $request->file_paspor_ayah->move(public_path('uploads/akta/paspor_ayah'), $paspor_ayah);
        $request->file_paspor_ibu->move(public_path('uploads/akta/paspor_ibu'), $paspor_ibu);
        $request->file_izin_tinggal_ayah->move(public_path('uploads/akta/izin_ayah'), $izin_ayah);
        $request->file_izin_tinggal_ibu->move(public_path('uploads/akta/izin_ibu'), $izin_ibu);

        $mk = AktaLahir::create($request->all());

        $admins = User::whereHas('roles', function ($query){
            $query->where('id', 1);
        })->get();

        Notification::send($admins, new AktaLahirNotification(
            $mk->with('user')->where('id', $mk->id)->first()
        ));

        return redirect('surat/akta-lahir')
            ->with('successMsg', 'Permohonan Akta berhasil diajukan');

    }
}
