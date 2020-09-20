@extends('admin.layouts.master')
@section('title', 'Edit Artikel')
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
                <h4 class="card-title ">Tambah Artikel</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.blog.update', $blog->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group py-3 mt-3">
                        <label for="judul">Judul Artikel</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required value="{{old('judul', $blog->judul)}}">

                        @error('judul')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="mytextarea">Konten</label>
                        <textarea class="form-control @error('konten') is-invalid @enderror" id="mytextarea" name="konten">{{old('konten',$blog->konten)}}</textarea>

                        @error('konten')
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
                            <img id="preview" class="img-thumbnail" src="{{asset('storage/'.$blog->thumbnail)}}" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-block">Edit Artikel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
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
