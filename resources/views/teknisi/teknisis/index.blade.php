@extends('layouts.teknisi')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.teknisi.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('teknisi.teknisis.store') }}" enctype="multipart/form-data">
                @csrf
                @if ($teknisi == null)
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
                        <input class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" type="text"
                            name="no" id="no" value="{{ old('no', '') }}" required>
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
                        <label class="required" for="layanan_id">Keahlian</label>
                        <select class="form-control select2 {{ $errors->has('layanan') ? 'is-invalid' : '' }}"
                            name="layanan_id" id="layanan_id" required>
                            @foreach ($layanans as $id => $entry)
                                <option value="{{ $id }}"
                                    {{ (old('layanan_id') ? old('layanan_id') : $teknisi->layanan->id ?? '') == $id ? 'selected' : '' }}>
                                    {{ $entry }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('layanan'))
                            <span class="text-danger">{{ $errors->first('layanan') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.pemesanan.fields.layanan_helper') }}</span>
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
                @else
                    <div class="form-group">
                        <label class="required" for="nama">{{ trans('cruds.teknisi.fields.nama') }}</label>
                        <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text"
                            name="nama" id="nama" value="{{ old('nama', $teknisi->nama) }}" required>
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.teknisi.fields.nama_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="no">{{ trans('cruds.teknisi.fields.no') }}</label>
                        <input class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" type="text"
                            name="no" id="no" value="{{ old('no', $teknisi->no) }}" required>
                        @if ($errors->has('no'))
                            <span class="text-danger">{{ $errors->first('no') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.teknisi.fields.no_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="alamat">{{ trans('cruds.teknisi.fields.alamat') }}</label>
                        <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" required>{{ old('alamat', $teknisi->alamat) }}</textarea>
                        @if ($errors->has('alamat'))
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.teknisi.fields.alamat_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="layanan_id">Keahlian</label>
                        <select class="form-control select2 {{ $errors->has('layanan') ? 'is-invalid' : '' }}"
                            name="layanan_id" id="layanan_id" required>
                            @foreach ($layanans as $id => $entry)
                                <option value="{{ $id }}"
                                    {{ (old('layanan_id') ? old('layanan_id') : $teknisi->layanan->id ?? '') == $id ? 'selected' : '' }}>
                                    {{ $entry }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('layanan'))
                            <span class="text-danger">{{ $errors->first('layanan') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.pemesanan.fields.layanan_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="image">Foto Profil</label><br />
                        <img id="previewImage" class="mb-2" src="{{ $teknisi->getImage() }}" width="10%"
                            alt="">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                for="customFile">Pilih Gambar</label>
                        </div>
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                @endif

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
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
