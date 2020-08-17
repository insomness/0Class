@extends('admin.layouts.master')
@section('title')
    Edit Kelas
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
                <h4 class="card-title ">Edit Kelas</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.kelas.update', $kelas->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group py-3 mt-3">
                        <label for="nama">Nama Kelas</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama_kelas" required value="{{old('nama', $kelas->nama_kelas)}}">

                        @error('nama')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="jenis_kelas">Jenis Kelas</label>
                        <select class="form-control @error('jenis_kelas') is-invalid @enderror" id="jenis_kelas" required name="jenis_kelas">
                            <option value="" disabled>Pilih..</option>
                            <option value="gratis" {{$kelas->jenis_kelas == 'gratis' ? 'selected' : ''}}>Gratis</option>
                            <option value="regular" {{$kelas->jenis_kelas == 'regular' ? 'selected' : ''}}>Regular</option>
                            <option value="premium" {{$kelas->jenis_kelas == 'premium' ? 'selected' : ''}}>Premium</option>
                        </select>

                        @error('jenis_kelas')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="editor">Deskripsi</label>
                        <textarea name="deskripsi" id="ckeditor">
                            {!!$kelas->deskripsi!!}
                        </textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col-md-6">
                            <label for="files">Pilih Gambar : </label>
                            <input type="file"id="files" name="thumbnail" class="d-block">
                            <small>*Kosongkan jika tidak ingin mengganti</small>
                        </div>

                        <div class="col-md-6">
                            <img id="preview" class="img-thumbnail" src="{{asset('storage/' . $kelas->thumbnail)}}"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-block">Edit Kelas</button>
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
</script>
<script>
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
