<?php

namespace App\Http\Requests;

use App\Models\RiwayatPemesanan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate as FacadesGate;

class StoreRiwayatPemesananRequest extends FormRequest
{
    public function authorize()
    {
        return FacadesGate::allows('riwayat_pemesanan_create');
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