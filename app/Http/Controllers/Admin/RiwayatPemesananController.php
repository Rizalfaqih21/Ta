<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRiwayatPemesananRequest;
use App\Http\Requests\StoreRiwayatPemesananRequest;
use App\Http\Requests\UpdateRiwayatPemesananRequest;
use App\Models\Pemesanan;
use App\Models\RiwayatPemesanan;
use App\Models\Teknisi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RiwayatPemesananController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('riwayat_pemesanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riwayatPemesanans = RiwayatPemesanan::with(['pemesanan', 'teknisi'])->get();

        return view('admin.riwayatPemesanans.index', compact('riwayatPemesanans'));
    }

    public function create()
    {
        abort_if(Gate::denies('riwayat_pemesanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemesanans = Pemesanan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teknisis = Teknisi::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.riwayatPemesanans.create', compact('pemesanans', 'teknisis'));
    }

    public function store(StoreRiwayatPemesananRequest $request)
    {
        $riwayatPemesanan = RiwayatPemesanan::create($request->all());

        return redirect()->route('admin.riwayat-pemesanans.index');
    }

    public function edit(RiwayatPemesanan $riwayatPemesanan)
    {
        abort_if(Gate::denies('riwayat_pemesanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemesanans = Pemesanan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teknisis = Teknisi::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $riwayatPemesanan->load('pemesanan', 'teknisi');

        return view('admin.riwayatPemesanans.edit', compact('pemesanans', 'riwayatPemesanan', 'teknisis'));
    }

    public function update(UpdateRiwayatPemesananRequest $request, RiwayatPemesanan $riwayatPemesanan)
    {
        $riwayatPemesanan->update($request->all());

        return redirect()->route('admin.riwayat-pemesanans.index');
    }

    public function show(RiwayatPemesanan $riwayatPemesanan)
    {
        abort_if(Gate::denies('riwayat_pemesanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riwayatPemesanan->load('pemesanan', 'teknisi');

        return view('admin.riwayatPemesanans.show', compact('riwayatPemesanan'));
    }

    public function destroy(RiwayatPemesanan $riwayatPemesanan)
    {
        abort_if(Gate::denies('riwayat_pemesanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riwayatPemesanan->delete();

        return back();
    }

    public function massDestroy(MassDestroyRiwayatPemesananRequest $request)
    {
        $riwayatPemesanans = RiwayatPemesanan::find(request('ids'));

        foreach ($riwayatPemesanans as $riwayatPemesanan) {
            $riwayatPemesanan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}