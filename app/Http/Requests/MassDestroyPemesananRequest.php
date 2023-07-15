<?php

namespace App\Http\Requests;

use App\Models\Pemesanan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPemesananRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pemesanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pemesanans,id',
        ];
    }
}