<?php

namespace App\Http\Requests;

use App\Models\Layanan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLayananRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('layanan_edit');
    }

    public function rules()
    {
        return [
            'layanan' => [
                'string',
                'required',
            ],
        ];
    }
}