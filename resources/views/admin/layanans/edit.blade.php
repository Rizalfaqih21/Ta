@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.layanan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.layanans.update", [$layanan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="layanan">{{ trans('cruds.layanan.fields.layanan') }}</label>
                <input class="form-control {{ $errors->has('layanan') ? 'is-invalid' : '' }}" type="text" name="layanan" id="layanan" value="{{ old('layanan', $layanan->layanan) }}" required>
                @if($errors->has('layanan'))
                    <span class="text-danger">{{ $errors->first('layanan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.layanan.fields.layanan_helper') }}</span>
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