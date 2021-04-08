<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\AlamatMesir;
use App\Models\MasukMesir;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MasukMesirController extends Controller
{
    public function index()
    {
        $data = MasukMesir::where('user_id', backpack_auth()->id())->get() ?? null;

        return view('pages.surat.masuk-mesir.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new MasukMesir(), 'no_surat', 'K/MM', 4);
        return \view('pages.surat.masuk-mesir.create', [
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
            'no_surat' => 'unique:masuk_mesirs'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new MasukMesir(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        MasukMesir::create([
            'user_id' => backpack_user()->id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'status' => 'new'
        ]);

        return \redirect('dashboard')
            ->with('successMsg','Izin masuk Mesir berhasil di ajukan');
    }
}
