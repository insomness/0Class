@extends('layouts.front')
@section('title', 'Akun')
@section('content')
<section class="special_cource padding_top my-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Edit Profile</h2>
                </div>
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
                        <form method="POST" action="{{route('akun.update')}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control " name="name" required autocomplete="" value="{{auth()->user()->name}}">
                                </div>

                            <div class="form-group py-3 mt-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
                            </div>

                            <button type="submit" class="btn_4 py-2 btn-block">
                                Perbarui Akun
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
