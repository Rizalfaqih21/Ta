<?php

namespace App\Http\Requests;

use App\Models\Teknisi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTeknisiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('teknisi_create');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
            'no' => [
                'string',
                'required',
            ],
            'alamat' => [
                'required',
            ],
            'keahlian' => [
                'string',
                'required',
            ],
        ];
    }
}