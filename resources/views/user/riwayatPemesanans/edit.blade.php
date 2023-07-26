@extends('layouts.user')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.riwayatPemesanan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("user.riwayat-pemesanans.update", [$riwayatPemesanan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="pemesanan_id">{{ trans('cruds.riwayatPemesanan.fields.pemesanan') }}</label>
                <select class="form-control select2 {{ $errors->has('pemesanan') ? 'is-invalid' : '' }}" name="pemesanan_id" id="pemesanan_id" required>
                    @foreach($pemesanans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pemesanan_id') ? old('pemesanan_id') : $riwayatPemesanan->pemesanan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pemesanan'))
                    <span class="text-danger">{{ $errors->first('pemesanan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.riwayatPemesanan.fields.pemesanan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="teknisi_id">{{ trans('cruds.riwayatPemesanan.fields.teknisi') }}</label>
                <select class="form-control select2 {{ $errors->has('teknisi') ? 'is-invalid' : '' }}" name="teknisi_id" id="teknisi_id">
                    @foreach($teknisis as $id => $entry)
                        <option value="{{ $id }}" {{ (old('teknisi_id') ? old('teknisi_id') : $riwayatPemesanan->teknisi->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('teknisi'))
                    <span class="text-danger">{{ $errors->first('teknisi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.riwayatPemesanan.fields.teknisi_helper') }}</span>
            </div>
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