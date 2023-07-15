@extends('layouts.teknisi')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pemesanan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("teknisi.pemesanans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.pemesanan.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemesanan.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="layanan_id">{{ trans('cruds.pemesanan.fields.layanan') }}</label>
                <select class="form-control select2 {{ $errors->has('layanan') ? 'is-invalid' : '' }}" name="layanan_id" id="layanan_id" required>
                    @foreach($layanans as $id => $entry)
                        <option value="{{ $id }}" {{ old('layanan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('layanan'))
                    <span class="text-danger">{{ $errors->first('layanan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemesanan.fields.layanan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.pemesanan.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemesanan.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_hp">{{ trans('cruds.pemesanan.fields.no_hp') }}</label>
                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', '') }}" required>
                @if($errors->has('no_hp'))
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemesanan.fields.no_hp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.pemesanan.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemesanan.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_barang">{{ trans('cruds.pemesanan.fields.nama_barang') }}</label>
                <input class="form-control {{ $errors->has('nama_barang') ? 'is-invalid' : '' }}" type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', '') }}" required>
                @if($errors->has('nama_barang'))
                    <span class="text-danger">{{ $errors->first('nama_barang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemesanan.fields.nama_barang_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="deskripsi">{{ trans('cruds.pemesanan.fields.deskripsi') }}</label>
                <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi" required>{{ old('deskripsi') }}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemesanan.fields.deskripsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pemesanan.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Pemesanan::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Order masuk') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemesanan.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection