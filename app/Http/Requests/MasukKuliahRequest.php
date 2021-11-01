<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class MasukKuliahRequest extends FormRequest
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
            'user_id' => 'required',
            'institute_id' => 'required',
            'fakultas_id' => 'required',
            'jurusan_id' => 'required',
            'jenjang_id' => 'required',
            'tujuan' => 'required',
            'jml_surat'    => 'required',
            'keperluan' => 'required',
            'no_surat' => 'unique:masuk_kuliahs',
            'no_permohonan' => 'unique:masuk_kuliahs'
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
