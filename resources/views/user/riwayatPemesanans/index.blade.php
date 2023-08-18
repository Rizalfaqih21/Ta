@extends('layouts.user')
@section('content')
@can('riwayat_pemesanan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('user.riwayat-pemesanans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.riwayatPemesanan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.riwayatPemesanan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RiwayatPemesanan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.riwayatPemesanan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.riwayatPemesanan.fields.pemesanan') }}
                        </th>
                        <th>
                            {{ trans('cruds.riwayatPemesanan.fields.teknisi') }}
                        </th>
                        <th>
                            {{ trans('cruds.riwayatPemesanan.fields.status') }}
                        </th>
                        <th>
                            Created_at
                        </th>
                        <th>
                            Updated_at
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($riwayatPemesanans as $key => $riwayatPemesanan)
                        <tr data-entry-id="{{ $riwayatPemesanan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>
                                {{ $riwayatPemesanan->pemesanan->nama ?? '' }}
                            </td>
                            <td>
                                {{ $riwayatPemesanan->teknisi->nama ?? 'Belum ada yang Ambil Pesanan' }}
                            </td>
                            <td>
                                {{ App\Models\RiwayatPemesanan::STATUS_SELECT[$riwayatPemesanan->status] ?? '' }}
                            </td>
                            <td>
                                {{ $riwayatPemesanan->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $riwayatPemesanan->updated_at ?? '' }}
                            </td>
                            <td>
                                @can('riwayat_pemesanan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('user.riwayat-pemesanans.show', $riwayatPemesanan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('riwayat_pemesanan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('user.riwayat-pemesanans.edit', $riwayatPemesanan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('riwayat_pemesanan_delete')
                                    <form action="{{ route('user.riwayat-pemesanans.destroy', $riwayatPemesanan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-RiwayatPemesanan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection