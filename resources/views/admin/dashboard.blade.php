@extends('admin.layouts.master')
@section('title', 'dashboard')
@section('content')
@include('admin.layouts.message')
<div class="row">
    <div class="col-md-4">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">group</i>
          </div>
          <p class="card-category">Jumlah User</p>
          <h3 class="card-title">{{$users->count()}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">subdirectory_arrow_right</i>
            <a href="{{route('admin.user.index')}}" class="text-info">Klik untuk melihat detail</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">school</i>
          </div>
          <p class="card-category">Jumlah Kelas</p>
          <h3 class="card-title">{{$kelas->count()}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">subdirectory_arrow_right</i>
            <a href="{{route('admin.kelas.index')}}" class="text-info">Klik untuk melihat detail</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">account_balance_wallet</i>
          </div>
          <p class="card-category">Transaksi Pending</p>
          <h3 class="card-title">{{$transaksi->count()}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">subdirectory_arrow_right</i>
            <a href="{{route('admin.transaksi.index')}}" class="text-info">Klik untuk melihat detail</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
