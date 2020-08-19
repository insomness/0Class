@extends('admin.layouts.master')
@section('title')
    Edit Profil
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
                <h4 class="card-title ">Edit Profil</h4>
            </div>
            <div class="card-body">
                <form method="POST" action=" {{route('admin.user.simpan_ubah_password')}} ">
                    @csrf
                    @method('PATCH')
                    <div class="form-group py-3 mt-3">
                        <label for="oldpassword">Password Lama</label>
                        <input type="password" class="form-control" id="oldpassword" name="oldPassword" autocomplete="new-password">
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="password">Password baru</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="password">Konfirmasi Password baru</label>
                        <input type="password" class="form-control" id="password" name="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
