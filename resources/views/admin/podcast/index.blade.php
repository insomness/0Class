@extends('admin.layouts.master')
@section('title')
    Daftar Podcasts
@show
@section('content')
<div class="row">
    <div class="col-md">
        @include('admin.layouts.message')
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-nav-tabs">
            <h4 class="card-header card-header-primary">
                Daftar Podcasts
            </h4>
            <div class="row mt-3 mb-n5">
                <div class="col-md d-flex justify-content-end mr-3">
                    <a href="{{route('admin.podcast.create')}}" class="btn btn-primary">Tambah Podcast</a>
                </div>
              </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripped" id="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Embed</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($podcasts as $podcast)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td> {{$podcast->judul}} </td>
                            <td> {{$podcast->embed}} </td>
                            <td>
                                <img src="https://img.youtube.com/vi/{{$podcast->embed}}/0.jpg" class="img-fluid" width="200" height="200">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('admin.podcast.show', $podcast->id)}}" class="btn btn-info btn-block ">Detail</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <h4 class="d-flex justify-content-center">Tidak ada podcast, silahkan tambahkan.</h4>
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
    </div>
</div>
@endsection
