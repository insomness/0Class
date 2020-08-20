@extends('layouts.front')
@section('title', 'Akun')
@section('content')
<section class="special_cource padding_top my-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="section_tittle text-center">
                    <h2>Detail Akun</h2>
                </div>
                <table class="d-flex justify-content-center">
                    <tr>
                        <td><h4>Nama</h4></td>
                        <td class="px-3"><h3>:</h3></td>
                        <td><h4>{{auth()->user()->name}}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>Email</h4></td>
                        <td class="px-3"><h3>:</h3></td>
                        <td><h4>{{auth()->user()->email}}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>Jenis Akun</h4></td>
                        <td class="px-3"><h3>:</h3></td>
                        <td><h4>{{auth()->user()->role}}</h4></td>
                    </tr>
                    <tr>
                        <td >
                            <a href="{{route('akun.edit')}}" class="genric-btn primary">
                                Edit Profile
                            </a>
                            <a href="{{route('akun.ubah_password')}}" class="genric-btn info">
                                Ubah Password
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
