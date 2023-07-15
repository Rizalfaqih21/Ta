<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeknisiRequest;
use App\Http\Requests\StoreTeknisiRequest;
use App\Http\Requests\UpdateTeknisiRequest;
use App\Models\Teknisi;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeknisiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('teknisi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teknisis = Teknisi::with(['user'])->get();

        return view('teknisi.teknisis.index', compact('teknisis'));
    }

    public function create()
    {
        abort_if(Gate::denies('teknisi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('teknisi.teknisis.create', compact('users'));
    }

    public function store(StoreTeknisiRequest $request)
    {
        $teknisi = Teknisi::create($request->all());

        return redirect()->route('teknisi.teknisis.index');
    }

    public function edit(Teknisi $teknisi)
    {
        abort_if(Gate::denies('teknisi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teknisi->load('user');

        return view('teknisi.teknisis.edit', compact('teknisi', 'users'));
    }

    public function update(UpdateTeknisiRequest $request, Teknisi $teknisi)
    {
        $teknisi->update($request->all());

        return redirect()->route('teknisi.teknisis.index');
    }

    public function show(Teknisi $teknisi)
    {
        abort_if(Gate::denies('teknisi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teknisi->load('user');

        return view('teknisi.teknisis.show', compact('teknisi'));
    }

    public function destroy(Teknisi $teknisi)
    {
        abort_if(Gate::denies('teknisi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teknisi->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeknisiRequest $request)
    {
        $teknisis = Teknisi::find(request('ids'));

        foreach ($teknisis as $teknisi) {
            $teknisi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}