<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPemesananRequest;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Layanan;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PemesananController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pemesanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemesanans = Pemesanan::where('user_id', auth()->id())->with(['user', 'layanan'])->get();

        return view('user.pemesanans.index', compact('pemesanans'));
    }

    public function create()
    {
        abort_if(Gate::denies('pemesanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $layanans = Layanan::pluck('layanan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('user.pemesanans.create', compact('layanans'));
    }

    public function store(StorePemesananRequest $request)
    {
        $attr = $request->all();
        $attr['user_id'] = auth()->id();
        $attr['status'] = 'Order Masuk';
        $pemesanan = Pemesanan::create($attr);

        return redirect()->route('user.pemesanans.index');
    }

    public function edit(Pemesanan $pemesanan)
    {
        abort_if(Gate::denies('pemesanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $layanans = Layanan::pluck('layanan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pemesanan->load('user', 'layanan');

        return view('user.pemesanans.edit', compact('layanans', 'pemesanan'));
    }

    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        
        $attr = $request->all();
        $attr['user_id'] = auth()->id();
        $pemesanan->update($attr);

        return redirect()->route('user.pemesanans.index');
    }

    public function show(Pemesanan $pemesanan)
    {
        abort_if(Gate::denies('pemesanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemesanan->load('user', 'layanan', 'pemesananRiwayatPemesanans');

        return view('user.pemesanans.show', compact('pemesanan'));
    }

    public function destroy(Pemesanan $pemesanan)
    {
        abort_if(Gate::denies('pemesanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemesanan->delete();

        return back();
    }

    public function massDestroy(MassDestroyPemesananRequest $request)
    {
        $pemesanans = Pemesanan::find(request('ids'));

        foreach ($pemesanans as $pemesanan) {
            $pemesanan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}