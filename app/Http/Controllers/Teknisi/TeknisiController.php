<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeknisiRequest;
use App\Http\Requests\StoreTeknisiRequest;
use App\Http\Requests\UpdateTeknisiRequest;
use App\Models\Teknisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TeknisiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('teknisi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teknisi = Teknisi::with(['user'])->first();

        return view('teknisi.teknisis.index', compact('teknisi'));
    }


    public function store(StoreTeknisiRequest $request)
    {
        Teknisi::updateOrCreate([
            'user_id'   => auth()->id(),
        ], [
            'nama'     => $request->get('nama'),
            'no' => $request->get('no'),
            'alamat'   => $request->get('alamat'),
            'keahlian'   => $request->get('keahlian'),
        ]);

        return redirect()->route('teknisi.teknisis.index')->with('message', 'Berhasil Mengupdate data.');
    }
}