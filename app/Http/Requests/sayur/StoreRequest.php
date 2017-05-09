<?php

namespace App\Http\Requests\sayur;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'foto' => 'Required',
            'nama' => 'Required',
            'family' => 'Required',
            'tanggal_tanam' => 'Required',
            'usia' => 'Required',
            'hama' => 'Required',
            'syarat_tumbuh' => 'Required',
            'pemeliharaan' => 'Required'
        ];
    }


    public function messages()
    {
        return [
            'foto.required' => 'silahkan Upload Foto.',
            'nama.required' => 'Nama Tidak Boleh Kosong.',
            'family.required' => 'Family Tidak Boleh Kosong.',
            'tanggal_tanam.required' => 'Tanggal Tanamn Tidak Boleh Kosong.',
            'usia.required' => 'Usia Tidak Boleh Kosong.',
            'hama.required' => 'Hama Tidak Boleh Kosong.',
            'syarat_tumbuh.required' => 'Syarat Tumbuh Tidak Boleh Kosong.',
            'pemeliharaan.required' => 'Pemliharaan Tidak Boleh Kosong.'
        ];
    }

}
