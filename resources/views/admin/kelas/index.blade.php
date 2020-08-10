@extends('admin.layouts.master')
@section('title')
    Daftar Kelas
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
                Daftar Kelas
            </h4>
            <div class="row mt-3 mb-n5">
                <div class="col-md d-flex justify-content-end mr-3">
                    <a href="{{route('admin.kelas.create')}}" class="btn btn-info">Tambah</a>
                </div>
              </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th>Nama Kelas</th>
                        <th scope="col">Jenis Kelas</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($kelas as $k)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td> {{$k->nama_kelas}} </td>
                        <th>{{$k->jenis_kelas}}</th>
                        <td>
                            <img src="{{asset($k->thumbnail)}}" alt="kelas">
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('admin.kelas.show', $k->id)}}" class="btn btn-warning">Detail</a>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
    </div>
</div>
@endsection
