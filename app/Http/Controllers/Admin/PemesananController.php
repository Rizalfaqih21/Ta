<?php

namespace App\Http\Controllers\Admin;

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

        $pemesanans = Pemesanan::with(['user', 'layanan'])->get();

        return view('admin.pemesanans.index', compact('pemesanans'));
    }

    public function create()
    {
        abort_if(Gate::denies('pemesanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $layanans = Layanan::pluck('layanan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pemesanans.create', compact('layanans', 'users'));
    }

    public function store(StorePemesananRequest $request)
    {
        $pemesanan = Pemesanan::create($request->all());

        return redirect()->route('admin.pemesanans.index');
    }
    
    public function verif(Request $request, Pemesanan $pemesanan)
    {
        $pemesanan->status = $request->input('status');

        $pemesanan->save();

        return back()->with('message', 'Berhasil diambil Pemenesanan!');
    }

    public function edit(Pemesanan $pemesanan)
    {
        abort_if(Gate::denies('pemesanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $layanans = Layanan::pluck('layanan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pemesanan->load('user', 'layanan');

        return view('admin.pemesanans.edit', compact('layanans', 'pemesanan', 'users'));
    }

    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        $pemesanan->update($request->all());

        return redirect()->route('admin.pemesanans.index');
    }

    public function show(Pemesanan $pemesanan)
    {
        abort_if(Gate::denies('pemesanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemesanan->load('user', 'layanan', 'pemesananRiwayatPemesanans');

        return view('admin.pemesanans.show', compact('pemesanan'));
    }

    public function destroy(Pemesanan $pemesanan)
    {
        abort_if(Gate::denies('pemesanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemesanan->delete();

        return back()->with('message', 'Berhasil Dihapus');
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