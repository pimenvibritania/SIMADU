<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\PendidikanMesir;
use App\Models\RiwayatPendidikan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

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
        if (!is_null(auth()->user()->biodata))
            return redirect('dashboard');

        return view('pages.biodata');
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
            'file_img_akte' => 'required|mimetypes:application/pdf|max:10000',
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
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        if (is_null(auth()->user()->biodata))
            return redirect('dashboard');
        $bio = Biodata::find($id);

        return \view('pages.biodata_show')->with($bio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $request->validate([
            'file_img_ijazah' => 'mimetypes:application/pdf|max:10000'
        ]);

        if ($request->file_img_ijazah != null){
            $ijazahname = auth()->user()->email . '_' . time() . '.' .
                $request->file_img_ijazah->extension();

            $request['img_ijazah'] = $ijazahname;
            $request->file_img_ijazah->move(public_path('uploads/ijazah'), $ijazahname);

            $bio->update([
                'img_ijazah' => $request['img_ijazah']
            ]);
        }

        if ($request->pm_jenjang != null){
            PendidikanMesir::create([
                'biodata_id' => $bio->id,
                'pm_jenjang' => $request->pm_jenjang,
                'pm_instansi' => $request->pm_instansi,
                'pm_tempat' => $request->pm_tempat,
                'pm_masuk' => $request->pm_masuk,
                'pm_keluar' => $request->pm_keluar
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
            ->with('pendidikanMesir', PendidikanMesir::where('biodata_id',$bio->id )->get())
            ->with('riwayatPendidikan', RiwayatPendidikan::where('biodata_id',$bio->id )->get());
    }

    public function pendidikanIndex (){

        $bio_id = backpack_user()->biodata->id;
        return view('pages.pendidikan')
            ->with('pendidikanMesir', PendidikanMesir::where('biodata_id',$bio_id )->get())
            ->with('riwayatPendidikan', RiwayatPendidikan::where('biodata_id',$bio_id )->get());
    }
}
