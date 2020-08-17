@extends('admin.layouts.master')
@section('title')
    Tambah Kelas
@show
@section('content')
<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Tambah Kelas</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.kelas.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group py-3 mt-3">
                        <label for="nama">Nama Kelas</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama_kelas" required value="{{old('nama')}}">

                        @error('nama')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="jenis_kelas">Jenis Kelas</label>
                        <select class="form-control @error('jenis_kelas') is-invalid @enderror" id="jenis_kelas" required name="jenis_kelas">
                            <option value="" selected disabled>Pilih..</option>
                            <option value="gratis">Gratis</option>
                            <option value="regular">Regular</option>
                            <option value="premium">Premium</option>
                        </select>

                        @error('jenis_kelas')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="ckeditor">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="ckeditor" name="deskripsi">{{old('deskripsi')}}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col-md-6">
                            <label for="files">Pilih Gambar : </label>
                            <input type="file"id="files" name="thumbnail" class="d-block">
                            <small>*Gunakan ukuran 1920*1080</small>
                        </div>

                        <div class="col-md-6">
                            <img id="preview" class="img-thumbnail" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-block">Tambah Kelas</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        CKEDITOR.replace( 'ckeditor', {
            removePlugins: ['easyimage', 'image']
        });
        document.getElementById("files").onchange = function () {

        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
        };
    </script>
@endpush
