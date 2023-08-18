@extends('layouts.admin')
@section('content')
@can('pemesanan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pemesanans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pemesanan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pemesanan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pemesanan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pemesanan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemesanan.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemesanan.fields.layanan') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemesanan.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemesanan.fields.no_hp') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemesanan.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemesanan.fields.nama_barang') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemesanan.fields.deskripsi') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemesanan.fields.status') }}
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
                    @foreach($pemesanans as $key => $pemesanan)
                        <tr data-entry-id="{{ $pemesanan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>
                                {{ $pemesanan->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $pemesanan->layanan->layanan ?? '' }}
                            </td>
                            <td>
                                {{ $pemesanan->nama ?? '' }}
                            </td>
                            <td>
                                {{ $pemesanan->no_hp ?? '' }}
                            </td>
                            <td>
                                {{ $pemesanan->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $pemesanan->nama_barang ?? '' }}
                            </td>
                            <td>
                                {{ $pemesanan->deskripsi ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Pemesanan::STATUS_SELECT[$pemesanan->status] ?? '' }}
                            </td>
                            <td>
                                <form action="{{ route('admin.pemesanans.verif', $pemesanan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Sudah Ambil">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-success" value="Terima">
                                </form>

                                @can('pemesanan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pemesanans.show', $pemesanan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pemesanan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pemesanans.edit', $pemesanan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pemesanan_delete')
                                    <form action="{{ route('admin.pemesanans.destroy', $pemesanan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Pemesanan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection