<?php

namespace App\Http\Controllers;

use App\Models\Surat\IzinTinggal;
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
        return \view('pages.surat.izin_tinggal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
