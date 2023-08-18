<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRiwayatPemesananRequest;
use App\Http\Requests\StoreRiwayatPemesananRequest;
use App\Http\Requests\UpdateRiwayatPemesananRequest;
use App\Models\Pemesanan;
use App\Models\RiwayatPemesanan;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RiwayatPemesananController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('riwayat_pemesanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teknisi = Teknisi::where('user_id', auth()->id())->first();
        if ($teknisi === null) {
            return redirect()->back();
        }
        $id = $teknisi->id;
        $riwayatPemesanans = RiwayatPemesanan::with(['pemesanan', 'teknisi'])->where('teknisi_id', $id)->get();

        return view('teknisi.riwayatPemesanans.index', compact('riwayatPemesanans'));
    }

    public function create()
    {
        abort_if(Gate::denies('riwayat_pemesanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemesanans = Pemesanan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teknisis = Teknisi::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('teknisi.riwayatPemesanans.create', compact('pemesanans', 'teknisis'));
    }

    public function store(StoreRiwayatPemesananRequest $request)
    {
        $riwayatPemesanan = RiwayatPemesanan::create($request->all());

        return redirect()->route('teknisi.riwayat-pemesanans.index');
    }

    public function edit(RiwayatPemesanan $riwayatPemesanan)
    {
        abort_if(Gate::denies('riwayat_pemesanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemesanans = Pemesanan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teknisis = Teknisi::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $riwayatPemesanan->load('pemesanan', 'teknisi');

        return view('teknisi.riwayatPemesanans.edit', compact('pemesanans', 'riwayatPemesanan', 'teknisis'));
    }

    public function updatestatus(Request $request, RiwayatPemesanan $riwayatPemesanan)
    {
        $riwayatPemesanan->status = $request->input('status');

        $riwayatPemesanan->save();

        return redirect()->route('teknisi.riwayat-pemesanans.index');
    }

    public function update(UpdateRiwayatPemesananRequest $request, RiwayatPemesanan $riwayatPemesanan)
    {
        $riwayatPemesanan->update($request->all());

        return redirect()->route('teknisi.riwayat-pemesanans.index');
    }

    public function show(RiwayatPemesanan $riwayatPemesanan)
    {
        abort_if(Gate::denies('riwayat_pemesanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riwayatPemesanan->load('pemesanan', 'teknisi');

        return view('teknisi.riwayatPemesanans.show', compact('riwayatPemesanan'));
    }

    public function destroy(RiwayatPemesanan $riwayatPemesanan)
    {
        abort_if(Gate::denies('riwayat_pemesanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riwayatPemesanan->delete();

        return back();
    }
}