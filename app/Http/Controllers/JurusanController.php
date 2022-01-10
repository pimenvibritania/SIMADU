<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Jurusan;
use App\Models\Mahasiswa\Fakultas;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function jenjang()
    {
        $jenjang =  Jenjang::all();
        return response()->json(['jenjang' => $jenjang]);
    }

    public function fakultas()
    {
        $fakultas = Fakultas::all();
        return response()->json(['fakultas' => $fakultas]);
    }

    public function jurusan(Request $request)
    {
        $jurusan = Jurusan::where('fakultas_id', $request->fakultas)
            ->where('jenjang_id', $request->jenjang)
            ->get();
        return response()->json(['jurusan' => $jurusan]);
    }
}
