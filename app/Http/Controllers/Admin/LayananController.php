<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLayananRequest;
use App\Http\Requests\StoreLayananRequest;
use App\Http\Requests\UpdateLayananRequest;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LayananController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('layanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $layanans = Layanan::all();

        return view('admin.layanans.index', compact('layanans'));
    }

    public function create()
    {
        abort_if(Gate::denies('layanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.layanans.create');
    }

    public function store(StoreLayananRequest $request)
    {
        $layanan = Layanan::create($request->all());

        return redirect()->route('admin.layanans.index');
    }

    public function edit(Layanan $layanan)
    {
        abort_if(Gate::denies('layanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.layanans.edit', compact('layanan'));
    }

    public function update(UpdateLayananRequest $request, Layanan $layanan)
    {
        $layanan->update($request->all());

        return redirect()->route('admin.layanans.index');
    }

    public function show(Layanan $layanan)
    {
        abort_if(Gate::denies('layanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.layanans.show', compact('layanan'));
    }

    public function destroy(Layanan $layanan)
    {
        abort_if(Gate::denies('layanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $layanan->delete();

        return back();
    }

    public function massDestroy(MassDestroyLayananRequest $request)
    {
        $layanans = Layanan::find(request('ids'));

        foreach ($layanans as $layanan) {
            $layanan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}