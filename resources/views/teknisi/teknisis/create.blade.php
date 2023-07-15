@extends('layouts.teknisi')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.teknisi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("teknisi.teknisis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.teknisi.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.teknisi.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.teknisi.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.teknisi.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no">{{ trans('cruds.teknisi.fields.no') }}</label>
                <input class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" type="text" name="no" id="no" value="{{ old('no', '') }}" required>
                @if($errors->has('no'))
                    <span class="text-danger">{{ $errors->first('no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.teknisi.fields.no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alamat">{{ trans('cruds.teknisi.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" required>{{ old('alamat') }}</textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.teknisi.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="keahlian">{{ trans('cruds.teknisi.fields.keahlian') }}</label>
                <input class="form-control {{ $errors->has('keahlian') ? 'is-invalid' : '' }}" type="text" name="keahlian" id="keahlian" value="{{ old('keahlian', '') }}" required>
                @if($errors->has('keahlian'))
                    <span class="text-danger">{{ $errors->first('keahlian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.teknisi.fields.keahlian_helper') }}</span>
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