@extends('layouts.teknisi')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.riwayatPemesanan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('teknisi.riwayat-pemesanans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.riwayatPemesanan.fields.id') }}
                        </th>
                        <td>
                            {{ $riwayatPemesanan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riwayatPemesanan.fields.pemesanan') }}
                        </th>
                        <td>
                            {{ $riwayatPemesanan->pemesanan->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riwayatPemesanan.fields.teknisi') }}
                        </th>
                        <td>
                            {{ $riwayatPemesanan->teknisi->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riwayatPemesanan.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\RiwayatPemesanan::STATUS_SELECT[$riwayatPemesanan->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('teknisi.riwayat-pemesanans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection