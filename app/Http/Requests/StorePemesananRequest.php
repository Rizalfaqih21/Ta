<?php

namespace App\Http\Requests;

use App\Models\Pemesanan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePemesananRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pemesanan_create');
    }

    public function rules()
    {
        return [
            'layanan_id' => [
                'required',
                'integer',
            ],
            'nama' => [
                'string',
                'required',
            ],
            'no_hp' => [
                'string',
                'required',
            ],
            'nama_barang' => [
                'string',
                'required',
            ],
            'deskripsi' => [
                'required',
            ],
        ];
    }
}