@extends('layouts.teknisi')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.teknisi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('teknisi.teknisis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.teknisi.fields.id') }}
                        </th>
                        <td>
                            {{ $teknisi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teknisi.fields.user') }}
                        </th>
                        <td>
                            {{ $teknisi->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teknisi.fields.nama') }}
                        </th>
                        <td>
                            {{ $teknisi->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teknisi.fields.no') }}
                        </th>
                        <td>
                            {{ $teknisi->no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teknisi.fields.alamat') }}
                        </th>
                        <td>
                            {{ $teknisi->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teknisi.fields.keahlian') }}
                        </th>
                        <td>
                            {{ $teknisi->keahlian }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('teknisi.teknisis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection