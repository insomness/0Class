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
                    <a href="{{route('admin.kelas.create')}}" class="btn btn-primary">Tambah</a>
                </div>
              </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripped" id="table">
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
                        @forelse ($kelas as $k)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td> {{$k->nama_kelas}} </td>
                            <th>{{$k->jenis_kelas}}</th>
                            <td>
                                <img src="{{asset('storage/' . $k->thumbnail)}}" alt="kelas" height="100px" width="200px" >
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('admin.kelas.show', $k->id)}}" class="btn btn-info btn-block ">Detail</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <h4 class="d-flex justify-content-center">Tidak ada kelas, silahkan tambahkan kelas</h4>
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
