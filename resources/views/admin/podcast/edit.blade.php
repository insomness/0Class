@extends('admin.layouts.master')
@section('title', 'Tambah Podcast')
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
                <form method="POST" action="{{route('admin.podcast.update', $podcast->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group py-3 mt-3">
                        <label for="judul">Judul Podcast</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required value="{{old('judul', $podcast->judul)}}">

                        @error('judul')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="embed">Embed Video Youtube</label>
                        <input type="text" class="form-control @error('embed') is-invalid @enderror" id="embed" name="embed" required value="{{old('embed', $podcast->embed)}}">

                        @error('embed')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="mytextarea">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="mytextarea" name="deskripsi">{{old('deskripsi', $podcast->deskripsi)}}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary d-block">Perbarui Podcast</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
