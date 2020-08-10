@extends('admin.layouts.master')
@section('title')
    User
@show
@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">User Table</h4>
          <p class="card-category">Jumlah user yang mendaftar</p>
        </div>
        <div class="card-body">
        <div id="table_data">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
              </thead>
              <tbody>
            @foreach ($users as $key => $user)
                <tr>
                  <td> {{$users->firstItem() + $key}} </td>
                  <td> {{$user->name}} </td>
                  <td> {{$user->email}} </td>
                  <td> {{$user->role}} </td>
                  <td class="text-primary"> {{$user->created_at->diffForHumans()}} </td>
                  <td>
                    <div class="d-flex">
                    <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary" role="button">Edit</a>
                    <form action="{{route('admin.user.destroy', $user->id)}}" method="post" class="float-left d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('yakin?')">Hapus</button>
                    </form>
                    </div>
                  </td>
                </tr>
            @endforeach
            {{ $users->links() }}
              </tbody>
            </table>
          </div>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection
