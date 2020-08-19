@extends('admin.layouts.master')
@section('title')
    Detail Podcast
@show
@section('content')
@include('admin.layouts.message')
<div class="row">
    <div class="col-md-12">
        <div class="card card-nav-tabs">
            <h4 class="card-header card-header-primary">
                Detail Podcast
            </h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Deskripsi: </h4>
                        {!!$podcast->deskripsi!!}
                    </div>
                    <div class="col-md-6">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$podcast->embed}}?rel=0" allowfullscreen></iframe>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md d-md-flex align-items-center">
                                <a href="{{route('admin.podcast.edit', $podcast->id)}}" class="btn btn-info d-inline-block">Edit Podcast</a>
                                <form action="{{route('admin.podcast.destroy', $podcast->id)}}" method="post" id="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="return alertConfirm()">Hapus Podcast
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
@endsection
