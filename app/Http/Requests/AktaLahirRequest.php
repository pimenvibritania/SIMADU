<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class AktaLahirRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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

            'tempat_kelahiran' => 'required',
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

            'img_sk_dokter' => 'required',
            'img_paspor_ayah' => 'required',
            'img_paspor_ibu' => 'required',
            'img_izin_tinggal_ayah' => 'required',
            'img_izin_tinggal_ibu' => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
