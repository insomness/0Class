@extends('admin.layouts.master')
@section('title')
    Detail Blog
@show
@section('content')
@include('admin.layouts.message')
<div class="row">
    <div class="col-md-12">
        <div class="card card-nav-tabs">
            <h4 class="card-header card-header-primary">
                Detail Blog
            </h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Konten: </h4>
                        {!! $blog->konten !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Thumbnail :</h4>
                        <img src="{{asset('storage/' . $blog->thumbnail)}}" class="img-fluid">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md d-md-flex align-items-center">
                        <a href="{{route('admin.blog.edit', $blog->id)}}" class="btn btn-info d-inline-block">Edit Artikel</a>
                        <form action="{{route('admin.blog.destroy', $blog->id)}}" method="post" id="form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="return alertConfirm()">Hapus Artikel</button>
                        </form>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
@endsection
