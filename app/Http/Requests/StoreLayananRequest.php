<?php

namespace App\Http\Requests;

use App\Models\Layanan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class StoreLayananRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('layanan_create');
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