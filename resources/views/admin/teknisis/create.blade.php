@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.teknisi.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.teknisis.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="user_id">{{ trans('cruds.teknisi.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id"
                        id="user_id">
                        @foreach ($users as $id => $entry)
                            <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user'))
                        <span class="text-danger">{{ $errors->first('user') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.teknisi.fields.user_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nama">{{ trans('cruds.teknisi.fields.nama') }}</label>
                    <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text"
                        name="nama" id="nama" value="{{ old('nama', '') }}" required>
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.teknisi.fields.nama_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="no">{{ trans('cruds.teknisi.fields.no') }}</label>
                    <input class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" type="text" name="no"
                        id="no" value="{{ old('no', '') }}" required>
                    @if ($errors->has('no'))
                        <span class="text-danger">{{ $errors->first('no') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.teknisi.fields.no_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="alamat">{{ trans('cruds.teknisi.fields.alamat') }}</label>
                    <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" required>{{ old('alamat') }}</textarea>
                    @if ($errors->has('alamat'))
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.teknisi.fields.alamat_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="layanan_id">Keahlian</label>
                    <select class="form-control select2 {{ $errors->has('layanan') ? 'is-invalid' : '' }}"
                        name="layanan_id" id="layanan_id">
                        @foreach ($layanans as $id => $entry)
                            <option value="{{ $id }}" {{ old('layanan_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('layanan'))
                        <span class="text-danger">{{ $errors->first('layanan') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image">Foto Profil</label>
                    <img id="previewImage" class="mb-2" src="#" width="100%" alt="">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label {{ $errors->has('image') ? 'is-invalid' : '' }}"
                            for="customFile">Pilih Gambar</label>
                    </div>
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // fungsi ini akan berjalan ketika akan menambahkan gambar dimana fungsi ini
        // akan membuat preview image sebelum kita simpan gambar tersebut.      
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Ketika tag input file denghan class image di klik akan menjalankan fungsi di atas
        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endsection
