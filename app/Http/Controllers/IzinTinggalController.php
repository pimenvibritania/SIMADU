<?php

namespace App\Http\Controllers;

use App\Models\IzinTinggal;
use App\Helpers\Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IzinTinggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $data = IzinTinggal::where('user_id', backpack_auth()->id())->get() ?? null;

        return view('pages.surat.izin_tinggal.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new IzinTinggal(), 'no_surat', 'K/IT', 4);
        return \view('pages.surat.izin_tinggal.create', [
            'user' => $user,
            'no_surat'   => $no_surat
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'tujuan' => 'required',
            'jml_surat'    => 'required',
            'keperluan' => 'required',
            'tanda_tangan' => 'required'
        ]);

        $no_permohonan = Helper::generateId(new IzinTinggal(),
            'no_permohonan',
            strtoupper(substr($request->nama, 0, 1)) . '/' . backpack_user()->id ,
            3);

        IzinTinggal::create([
            'user_id' => backpack_user()->id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'tanda_tangan' => $request->tanda_tangan,
            'status' => 'new'
        ]);

        return \view('pages.dashboard')
        ->with('successMsg','Izin tinggal berhasil di ajukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat\IzinTinggal  $izinTinggal
     * @return Response
     */
    public function show(IzinTinggal $izinTinggal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat\IzinTinggal  $izinTinggal
     * @return Response
     */
    public function edit(IzinTinggal $izinTinggal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat\IzinTinggal  $izinTinggal
     * @return Response
     */
    public function update(Request $request, IzinTinggal $izinTinggal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat\IzinTinggal  $izinTinggal
     * @return Response
     */
    public function destroy(IzinTinggal $izinTinggal)
    {
        //
    }
}
