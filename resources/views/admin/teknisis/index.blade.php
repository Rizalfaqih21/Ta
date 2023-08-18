@extends('layouts.admin')
@section('content')
@can('teknisi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.teknisis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.teknisi.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.teknisi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Teknisi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.teknisi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.teknisi.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.teknisi.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.teknisi.fields.no') }}
                        </th>
                        <th>
                            {{ trans('cruds.teknisi.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.teknisi.fields.keahlian') }}
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
                    @foreach($teknisis as $key => $teknisi)
                        <tr data-entry-id="{{ $teknisi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>
                                {{ $teknisi->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $teknisi->nama ?? '' }}
                            </td>
                            <td>
                                {{ $teknisi->no ?? '' }}
                            </td>
                            <td>
                                {{ $teknisi->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $teknisi->layanan->layanan ?? '' }}
                            </td>
                            <td>
                                @can('teknisi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.teknisis.show', $teknisi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('teknisi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.teknisis.edit', $teknisi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('teknisi_delete')
                                    <form action="{{ route('admin.teknisis.destroy', $teknisi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Teknisi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection