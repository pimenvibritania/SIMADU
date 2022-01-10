<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class PendidikanMesirRequest extends FormRequest
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
            'thn_ajaran_1' => 'required',
            'thn_ajaran_2' => 'required',
            'thn_ajaran' => 'required',
            'tgl_lapor' => 'required',
            'jenjang_id' => 'required',
            'institute_id' => 'required',
            'fakultas_id' => 'required',
            'jurusan_id' => 'required',
            'master_level_id' => 'required',
            'ket_naik' => 'required',
            'nilai' => 'required',
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
