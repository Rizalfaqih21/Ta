<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeknisiRequest;
use App\Http\Requests\StoreTeknisiRequest;
use App\Http\Requests\UpdateTeknisiRequest;
use App\Models\Layanan;
use App\Models\Teknisi;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class TeknisiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('teknisi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teknisis = Teknisi::with(['user', 'layanan'])->get();

        return view('admin.teknisis.index', compact('teknisis'));
    }

    public function create()
    {
        abort_if(Gate::denies('teknisi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');
        $layanans = Layanan::pluck('layanan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.teknisis.create', compact('users', 'layanans'));
    }

    public function store(StoreTeknisiRequest $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);
        $attr = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadFile = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/imgCover/', $uploadFile);
            $attr['image'] = $uploadFile;
        }

        $teknisi = Teknisi::create($attr);

        return redirect()->route('admin.teknisis.index');
    }

    public function edit(Teknisi $teknisi)
    {
        abort_if(Gate::denies('teknisi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');
        $layanans = Layanan::pluck('layanan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teknisi->load('user');

        return view('admin.teknisis.edit', compact('teknisi', 'users', 'layanans'));
    }

    public function update(UpdateTeknisiRequest $request, Teknisi $teknisi)
    {
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);

        $attr = $request->all();
        if ($request->hasFile('image')) {
            
            if (File::exists("uploads/imgCover/" . $teknisi->image)) {
                File::delete("uploads/imgCover/" . $teknisi->image);
            }
            
            $file = $request->file("image");
            //$uploadFile = StoreImage::replace($teknisi->image,$file->getRealPath(),$file->getClientOriginalName());
            $uploadFile = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/imgCover/', $uploadFile);
            $teknisi->image = $uploadFile;
        }

        $teknisi->update($attr);

        return redirect()->route('admin.teknisis.index');
    }

    public function show(Teknisi $teknisi)
    {
        abort_if(Gate::denies('teknisi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teknisi->load('user');

        return view('admin.teknisis.show', compact('teknisi'));
    }

    public function destroy(Teknisi $teknisi)
    {
        abort_if(Gate::denies('teknisi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teknisi->delete();

        return back()->with('message', 'Berhasil Dihapus');
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