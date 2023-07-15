<?php

namespace App\Http\Requests;

use App\Models\RiwayatPemesanan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdateRiwayatPemesananRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('riwayat_pemesanan_edit');
    }

    public function rules()
    {
        return [
            'pemesanan_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}