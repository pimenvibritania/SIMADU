<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Pengampunan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PengampunanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new Pengampunan(), 'no_surat', 'K/PIT', 4);
        return \view('pages.surat.pengampunan.create', [
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
            'no_surat' => 'unique:pengampunans'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new Pengampunan(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        Pengampunan::create([
            'user_id' => backpack_user()->id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'status' => 'new'
        ]);

        return \redirect('dashboard')
            ->with('successMsg','Surat Pengampunan berhasil di ajukan');
    }

}
