<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeknisiRequest;
use App\Http\Requests\StoreTeknisiRequest;
use App\Http\Requests\UpdateTeknisiRequest;
use App\Models\Layanan;
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

        $teknisi = Teknisi::with(['user'])->where('user_id', auth()->id())->first();
        $layanans = Layanan::pluck('layanan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('teknisi.teknisis.index', compact('teknisi', 'layanans'));
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
        } else {
            // Jika tidak ada file gambar yang diunggah, gunakan gambar yang ada dalam database.
            $existingTeknisi = Teknisi::where('user_id', auth()->id())->first();
            if ($existingTeknisi) {
                $attr['image'] = $existingTeknisi->gambar;
            }
        }
        $teknisi = Teknisi::updateOrCreate([
            'user_id'   => auth()->id(),
        ], [
            'nama'     => $request->get('nama'),
            'no' => $request->get('no'),
            'alamat'   => $request->get('alamat'),
            'layanan_id'   => $request->get('layanan_id'),
            'gambar'   => $attr['image'],
        ]);

        
        return redirect()->route('teknisi.teknisis.index')->with('message', 'Berhasil Mengupdate data.');
    }
}