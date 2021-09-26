<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Biodata;
use App\Models\JenisPaspor;
use App\Models\PendidikanMesir;
use App\Models\RiwayatPendidikan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Yajra\DataTables\Facades\DataTables;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $agama = Agama::all();
        $jenisPaspor = JenisPaspor::all();

        if (!is_null(auth()->user())){
            if (is_null(auth()->user()->biodata)){
                return view('pages.biodata', compact(['agama', 'jenisPaspor']));

            }
            return redirect('dashboard');
        }
        return redirect('login');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $request['user_id'] = auth()->user()->id;

        $request->validate([
            'user_id'   => 'unique:biodatas',
            'nama' => 'required',
            'kelamin' => 'required',
            'agama'=> 'required',
            'pernikahan'=> 'required',
            'tempat_lahir'=> 'required',
            'tanggal_lahir'=> 'required',
            'tinggi_badan'=> 'required',
            'jenis_vipa_1'=> 'required',
            'no_paspor'=> 'required',
            'jenis_paspor'=> 'required',
            'keluar_paspor'=> 'required',
            'berlaku_paspor_from'=> 'required',
            'berlaku_paspor_to'=> 'required',
            'tiba_mesir'=> 'required',
            'tanggal_lapor'=> 'required',
            'dikeluarkan_oleh'=> 'required',
            'tujuan_mesir'=> 'required',
            'nama_ayah'=> 'required',
            'nama_ibu'=> 'required',
            'alamat_ayah'=> 'required',
            'alamat_ibu'=> 'required',
            'pekerjaan_ayah'=> 'required',
            'pekerjaan_ibu'=>'required',
            'no_ayah'=> 'required',
            'no_ibu'=> 'required',
            'alamat_mesir'=> 'required',
            'kota_mesir'=> 'required',
            'provinsi_mesir'=> 'required',
            'no_mesir'=> 'required',
            'alamat_indo'=> 'required',
            'kecamatan_indo'=> 'required',
            'desa_indo'=> 'required',
            'kota_indo'=> 'required',
            'provinsi_indo'=> 'required',
            'pos_indo'=> 'required',
            'no_indo'=> 'required',
            'file_img_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_img_profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_img_akte' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_img_paspor' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ktpname = auth()->user()->email . '_' . time() . '.' .
            $request->file_img_ktp->extension();

        $profilename = auth()->user()->email . '_' . time() . '.' .
            $request->file_img_profile->extension();

        $aktename = auth()->user()->email . '_' . time() . '.' .
            $request->file_img_akte->extension();

        $pasporname = auth()->user()->email . '_' . time() . '.' .
            $request->file_img_paspor->extension();

        $request['is_active'] = true;
        $request['no_induk'] = 'nomor';
        $request['img_ktp'] =  $ktpname;
        $request['img_profile'] = $profilename;
        $request['img_akte'] = $aktename;
        $request['img_paspor'] = $pasporname;

        $request->file_img_ktp->move(public_path('uploads/ktp'), $ktpname);
        $request->file_img_profile->move(public_path('uploads/profile'), $profilename);
        $request->file_img_akte->move(public_path('uploads/akte'), $aktename);
        $request->file_img_paspor->move(public_path('uploads/paspor'), $pasporname);

        Biodata::create($request->all());

        return redirect(backpack_user()->hasRole('mahasiswa')
            ? 'pendidikan'
            : 'dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View|Response
     */
    public function show()
    {
        if (is_null(auth()->user()->biodata))
            return redirect('dashboard');

        $bio = Biodata::where('user_id', backpack_user()->id)->first();

        return \view('pages.biodata_show')->with('bio', $bio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View|Response
     */
    public function edit()
    {
        if (!is_null(auth()->user())){

            $bio = auth()->user()->biodata;

            return \view('pages.biodata_edit')
                ->with(['bio' => $bio]);
        }
        return redirect('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request)
    {
        $bio = auth()->user()->biodata;

        if ($request->file_img_ktp){
            $ktpname = auth()->user()->email . '_' . time() . '.' .
                $request->file_img_ktp->extension();

            $request['img_ktp'] =  $ktpname;

            $request->file_img_ktp->move(public_path('uploads/ktp'), $ktpname);
        }

        if ($request->file_img_profile){
            $prname = auth()->user()->email . '_' . time() . '.' .
                $request->file_img_profile->extension();

            $request['img_profile'] =  $prname;

            $request->file_img_profile->move(public_path('uploads/profile'), $prname);
        }

        if ($request->file_img_akte){
            $img_akte = auth()->user()->email . '_' . time() . '.' .
                $request->file_img_akte->extension();

            $request['img_akte'] =  $img_akte;

            $request->file_img_akte->move(public_path('uploads/akte'), $img_akte);
        }

        if ($request->file_img_paspor){
            $img_paspor = auth()->user()->email . '_' . time() . '.' .
                $request->file_img_paspor->extension();

            $request['img_paspor'] =  $img_paspor;

            $request->file_img_paspor->move(public_path('uploads/paspor'), $img_paspor);
        }

        $bio->update($request->all());

        return redirect('biodata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function pendidikan(Request $request){

        $bio = Biodata::where('user_id', auth()->user()->id)->first();

        if ($request->file_img_ijazah != null){
            $request->validate([
                'file_img_ijazah' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $ijazahname = auth()->user()->email . '_' . time() . '.' .
                $request->file_img_ijazah->extension();

            $request['img_ijazah'] = $ijazahname;
            $request->file_img_ijazah->move(public_path('uploads/ijazah'), $ijazahname);

            $bio->update([
                'img_ijazah' => $request['img_ijazah']
            ]);
        }

        if ($request->rp_jenjang != null){
            RiwayatPendidikan::create([
                'biodata_id' => $bio->id,
                'rp_jenjang' => $request->rp_jenjang,
                'rp_instansi' => $request->rp_instansi,
                'rp_tempat' => $request->rp_tempat,
                'rp_masuk' => $request->rp_masuk,
                'rp_keluar' => $request->rp_keluar
            ]);
        }

        return redirect('pendidikan')
            ->with('riwayatPendidikan', RiwayatPendidikan::where('biodata_id',$bio->id )->get());
    }

    public function pendidikanIndex (Request $request){

        $bio = backpack_user()->biodata;
        $data = RiwayatPendidikan::where('biodata_id', $bio->id)->get();
        if ($request->ajax()) {
            return Datatables::of($data ?? null)
                ->addIndexColumn()
                ->editColumn('rp_masuk', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('rp_keluar', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->make(true);
        }
        return view('pages.pendidikan')
//            ->with('pendidikanMesir', PendidikanMesir::where('biodata_id',$bio_id )->get())
            ->with('riwayatPendidikan', $data);
    }

    public function pendidikanAdd(){
        $bio = backpack_user()->biodata;
        $data = RiwayatPendidikan::where('biodata_id', $bio->id)->get();
        return view('pages.add_pendidikan')
            ->with('riwayatPendidikan', $data);
    }

}
