@extends('admin.layouts.master')
@section('title', 'Edit User')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Edit User</h4>
            </div>
            <div class="card-body">
                <form method="POST" action=" {{route('admin.user.update', $user->id)}} ">
                    @csrf
                    @method('PUT')
                    <div class="form-group py-3 mt-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="name" value=" {{$user->name}} ">
                    </div>

                    <div class="form-group py-3 mt-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value=" {{$user->email}} ">
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="regular" {{$user->role == 'regular' ? 'selected' : ''}}>Regular</option>
                            <option value="premium" {{$user->role == 'premium' ? 'selected' : ''}}>Premium</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
