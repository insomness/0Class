@extends('admin.layouts.master')
@section('title')
    Tambah Artikel
@show
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
                <h4 class="card-title ">Tambah Rekening</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.rekening.update', $rekening->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group py-3 mt-3">
                        <label for="nomor_rekening">Nomor Rekening</label>
                        <input type="text" class="form-control @error('nomor_rekening') is-invalid @enderror" id="nomor_rekening" name="nomor_rekening" required value="{{old('nomor_rekening', $rekening->nomor_rekening)}}">

                        @error('nomor_rekening')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="atas_nama">Atas Nama</label>
                        <input type="text" class="form-control @error('atas_nama') is-invalid @enderror" id="atas_nama" name="atas_nama" required value="{{old('atas_nama', $rekening->atas_nama)}}">

                        @error('atas_nama')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary d-block">Update Rekening</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
