<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Rules\NIPAdmin;
use Illuminate\Foundation\Http\FormRequest;

class BiodataRequest extends FormRequest
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
            'user_id'   => 'unique:biodatas',
            'nip' => 'required',
            'niw' => 'required',
            'nama' => 'required',
            'kelamin' => 'required',
            'agama'=> 'required',
            'pernikahan'=> 'required',
            'tempat_lahir'=> 'required',
            'tanggal_lahir'=> 'required',
//            'tinggi_badan'=> 'required',
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
            'img_ktp' => 'required',
            'img_profile' => 'required',
            'img_akte' => 'required',
            'img_paspor' => 'required',
            'nama_mediator' => 'required',
            'kontak_mediator' => 'required',
            'nama_mitra_mediator' => 'required',
            'kontak_mitra_mediator' => 'required',
            'institute_id' => 'required',
            'fakultas_id' => 'required',
            'master_level_id' => 'required',
            'jenjang_id' => 'required',
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
