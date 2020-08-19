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
                <form method="POST" action=" {{route('admin.user.simpan_edit_profil')}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group py-3 mt-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="name" value="{{auth()->user()->name}}">
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Perbarui Profil</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
