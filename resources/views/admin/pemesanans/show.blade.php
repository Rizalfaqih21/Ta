@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pemesanan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pemesanans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pemesanan.fields.id') }}
                        </th>
                        <td>
                            {{ $pemesanan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemesanan.fields.user') }}
                        </th>
                        <td>
                            {{ $pemesanan->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemesanan.fields.layanan') }}
                        </th>
                        <td>
                            {{ $pemesanan->layanan->layanan ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemesanan.fields.nama') }}
                        </th>
                        <td>
                            {{ $pemesanan->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemesanan.fields.no_hp') }}
                        </th>
                        <td>
                            {{ $pemesanan->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemesanan.fields.alamat') }}
                        </th>
                        <td>
                            {{ $pemesanan->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemesanan.fields.nama_barang') }}
                        </th>
                        <td>
                            {{ $pemesanan->nama_barang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemesanan.fields.deskripsi') }}
                        </th>
                        <td>
                            {{ $pemesanan->deskripsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemesanan.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Pemesanan::STATUS_SELECT[$pemesanan->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pemesanans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#pemesanan_riwayat_pemesanans" role="tab" data-toggle="tab">
                {{ trans('cruds.riwayatPemesanan.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="pemesanan_riwayat_pemesanans">
            @includeIf('admin.pemesanans.relationships.pemesananRiwayatPemesanans', ['riwayatPemesanans' => $pemesanan->pemesananRiwayatPemesanans])
        </div>
    </div>
</div>

@endsection