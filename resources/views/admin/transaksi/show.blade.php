@extends('admin.layouts.master')
@section('title', 'Detail Blog')
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
                    <div class="col-md-6">
                        <table class="table table-stripped">
                            <tr>
                                <td >Nama User</td>
                                <td class="py-3 px-3">:</td>
                                <td>{{$transaksi->user->name}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Upload Bukti</td>
                                <td class="py-3 px-3">:</td>
                                <td>{{$transaksi->created_at->toDateString()}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td class="py-3 px-3">:</td>
                                <td>
                                    @switch($transaksi->status)
                                    @case(1)
                                    Disetujui
                                        @break
                                    @case(2)
                                    Ditolak
                                        @break
                                    @default
                                    Pending
                                @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td>Aksi</td>
                                <td class="py-3 px-3">:</td>
                                <td>
                                    <form action="{{route('admin.transaksi.update', $transaksi->id)}}" class="d-sm-flex" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select class="form-control @error('status') is-invalid @enderror" id="status" required name="status">
                                            <option value="0" {{$transaksi->status == 0 ? 'selected' : ''}} disabled>Pending</option>
                                            <option value="1" {{$transaksi->status == 1 ? 'selected' : ''}}  >Disetujui</option>
                                            <option value="2" {{$transaksi->status == 2 ? 'selected' : ''}} >Ditolak</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('storage/'.$transaksi->bukti_transfer)}}" class="img-fluid">
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
@endsection
