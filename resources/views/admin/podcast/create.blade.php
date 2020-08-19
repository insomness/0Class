@extends('admin.layouts.master')
@section('title')
    Tambah Podcast
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
                <h4 class="card-title ">Tambah Podcast</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.podcast.store')}}">
                    @csrf
                    @method('POST')
                    <div class="form-group py-3 mt-3">
                        <label for="judul">Judul Podcast</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required value="{{old('judul')}}">

                        @error('judul')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="embed">Embed Video Youtube</label>
                        <input type="text" class="form-control @error('embed') is-invalid @enderror" id="embed" name="embed" required value="{{old('embed')}}">

                        @error('embed')
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

                    <button type="submit" class="btn btn-primary d-block">Tambah Podcast</button>
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
@endpush
