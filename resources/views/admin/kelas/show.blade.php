@extends('admin.layouts.master')
@section('title')
    Detail Kelas
@show
@section('content')
@include('admin.layouts.message')
<div class="row">
    <div class="col-md-12">
        <div class="card card-nav-tabs">
            <h4 class="card-header card-header-primary">
                Detail {{$kelas->nama_kelas}}
            </h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Jenis Kelas: {{$kelas->jenis_kelas}}</p>
                        <p>Deskripsi: <br>{!!$kelas->deskripsi!!}</p>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('storage/' . $kelas->thumbnail)}}" class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md d-md-flex align-items-center">
                        <a href="{{route('admin.kelas.edit', $kelas->id)}}" class="btn btn-info d-inline-block">Edit Kelas</a>
                        <form action="{{route('admin.kelas.destroy', $kelas->id)}}" method="post" id="form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="return alertConfirm()">Hapus Kelas</button>
                        </form>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="card card-nav-tabs">
            <h4 class="card-header card-header-danger">
                Materi Kelas
            </h4>
            <div class="row">
                <div class="col-md d-flex justify-content-end">
                    <a href="{{route('admin.kelas.tambahvideo', $kelas->id)}}" class="btn btn-primary mr-3 mt-3 mb-n3">
                        Tambah Materi
                      </a>
                </div>
            </div>
            <div class="card-body mt-n3">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Url Video</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelas->videos as $video)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td>{{$video->judul}}</td>
                            <td> {{$video->embed}} </td>
                            <td class="d-md-flex">
                                <button type="submit" class="btn btn-info btn-block">Edit</button>
                                <form action="{{route('admin.kelas.hapusvideo', ['kelasId' => $kelas->id, 'videoId' => $video->id])}}" method="post" id="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-block" onclick="return alertConfirm()">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <h4 class="d-flex justify-content-center">Tidak ada video materi. Silahkan menambahkan video</h4>
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
