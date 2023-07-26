@extends('layouts.teknisi')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.riwayatPemesanan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("teknisi.riwayat-pemesanans.updatestatus", [$riwayatPemesanan->id]) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.riwayatPemesanan.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RiwayatPemesanan::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $riwayatPemesanan->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.riwayatPemesanan.fields.status_helper') }}</span>
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