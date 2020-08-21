@extends('admin.layouts.master')
@section('title')
    Rekening
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
                Rekening
            </h4>
            <div class="row mt-3 mb-n5">
                <div class="col-md d-flex justify-content-end mr-3">
                    <a href="{{route('admin.rekening.create')}}" class="btn btn-primary">Tambah Rekening</a>
                </div>
              </div>
            <div class="card-body">
                <table class="table table-stripped" id="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Rekening</th>
                        <th scope="col">Atas Nama</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($rekening as $r)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td> {{$r->nomor_rekening}} </td>
                        <td>{{$r->atas_nama}}</>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('admin.rekening.edit', $r->id)}}" class="btn btn-info btn-block ">Edit</a>
                                <form action="{{route('admin.rekening.destroy', $r->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="return alertConfirm()">Hapus Rekening
                                        </button>
                                    </form>
                                </form>
                            </div>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="5">
                            <h4 class="d-flex justify-content-center">Tidak ada Rekening, silahkan tambahkan Rekening</h4>
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
