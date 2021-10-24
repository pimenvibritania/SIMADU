<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{

    public function provisi(){
        $provinsi = Wilayah::where('LEVEL', 1)->get();

        return response()->json(['provinsi' => $provinsi]);
    }

    public function kota($id){
        $kota = Wilayah::where('LEVEL', 2)
            ->where('MST_KODE_WILAYAH', $id)
            ->get();

        return response()->json(['kota' => $kota]);
    }

    public function kecamatan($id){
        $kecamatan = Wilayah::where('LEVEL', 3)
            ->where('MST_KODE_WILAYAH', $id)
            ->get();

        return response()->json(['kecamatan' => $kecamatan]);
    }

    public function desa($id){
        $desa = Wilayah::where('LEVEL', 4)
            ->where('MST_KODE_WILAYAH', $id)
            ->get();

        return response()->json(['desa' => $desa]);
    }

    public function mesirProv()
    {
        $mesirProv =  DB::table('egypt_governorates')->get();

        return response()->json(['prov_mesir' => $mesirProv]);
    }

    public function mesirCity($id)
    {
        $mesirCity = DB::table('egypt_cities')
            ->where('egypt_governorate_id', $id)
            ->get();

        return response()->json(['kota_mesir' => $mesirCity]);
    }

}
