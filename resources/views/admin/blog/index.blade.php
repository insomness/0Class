@extends('admin.layouts.master')
@section('title')
    Data Blog
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
                Data Blog
            </h4>
            <div class="row mt-3 mb-n5">
                <div class="col-md d-flex justify-content-end mr-3">
                    <a href="{{route('admin.blog.create')}}" class="btn btn-primary">Tambah Artikel</a>
                </div>
              </div>
            <div class="card-body">
                <table class="table table-stripped" id="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Tanggal Posting</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($blogs as $blog)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td> {{$blog->judul}} </td>
                        <td>
                            <img src="{{asset('storage/' . $blog->thumbnail)}}" alt="kelas" height="100px" width="200px" >
                        </td>
                        <td>{{$blog->created_at->toDateString()}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('admin.blog.show', $blog->id)}}" class="btn btn-info btn-block ">Detail</a>
                            </div>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="5">
                            <h4 class="d-flex justify-content-center">Tidak ada artikel, silahkan tambahkan artikel</h4>
                        </td>
                      </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
          </div>
    </div>
</div>
@endsection
