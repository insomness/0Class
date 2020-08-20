@extends('layouts.front')
@section('title', 'Akun')
@section('content')
<section class="special_cource padding_top my-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Ubah Password</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action=" {{route('akun.simpan_ubah_password')}} ">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="oldPassword">Password lama</label>
                                <input id="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" required autocomplete="new-password">
                                @error('oldPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password baru</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Konfirmasi Password baru</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password" name="password_confirmation" class="is-invalid" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn_4 py-2 btn-block">Ubah Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
